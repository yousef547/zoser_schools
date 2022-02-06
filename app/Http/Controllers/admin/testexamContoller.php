<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\finalexam;
use App\Models\question;
use App\Models\questions_info;
use App\Models\result_exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class testexamContoller extends Controller
{
    public function index()
    {
        $allexam = finalexam::get();
        return view("admin.testexam.index", compact('allexam'));
    }
    public function test($id)
    {
        $allexam = finalexam::find($id);
        if (!$allexam) {
            return back()->with('error', 'this id exam not found');
        }
        $id_qestions = json_decode($allexam->question_ids);
        $questions = [];
        // dd();
        for ($i = 0; $i < count($id_qestions); $i++) {
            $oneQusetion = question::find($id_qestions[$i]);
            array_push($questions, $oneQusetion);
        }
        shuffle($questions);

        // dd($qusetions);
        return view("admin.testexam.test", compact('id', 'questions'));
    }
    public function submit(Request $request)
    {

        $exam_id = finalexam::find($request->id_exam);
        if (!$exam_id) {
            return back()->with('error', 'this id exam not found');
        }
        $id_qestions = json_decode($exam_id->question_ids);
        $questions = [];
        // dd();
        for ($i = 0; $i < count($id_qestions); $i++) {
            $oneQusetion = question::find($id_qestions[$i]);
            array_push($questions, $oneQusetion);
        }

        $degree = 0;
        $perCent = 1;

        $rightAnswer = [];
        for ($i = 0; $i < count($questions); $i++) {
            if ($questions[$i]->rigth_ans != null) {
                array_push($rightAnswer, $questions[$i]);
            } else {
                $infoAnswer = questions_info::where("question_id", $questions[$i]->id)->get();
                for ($y = 0; $y < count($infoAnswer); $y++) {
                    array_push($rightAnswer, $infoAnswer[$y]);
                }
            }
        }
        for ($y = 0; $y < count($rightAnswer); $y++) {
            for ($i = 0; $i < count($rightAnswer); $i++) {
                if (isset($request->answer[$y])) {
                    if ($request->answer[$y] == $rightAnswer[$i]->rigth_ans) {
                        $degree++;
                    }
                }
            }
        }
        $perCent = ($degree / count($rightAnswer)) * 100;
        $result_exam = result_exam::where("user_id", Auth()->user()->id)
            ->where("exam_id", $request->id_exam)->first();

        if (!$result_exam) {
            result_exam::create([
                "exam_id" => $request->id_exam,
                "user_id" => Auth()->user()->id,
                "result" => round($perCent)
            ]);
            return redirect()->route("testexam")->with('msg', 'You passed the exam successfully with a score of ' . round($perCent) . '%');
        } else {
            if ($perCent > $result_exam->result) {
                $result_exam->update([
                    "result" => round($perCent)
                ]);
                return redirect()->route("testexam")->with('msg', 'You passed the exam successfully with a score of ' . round($perCent) . '%');
            }
        }
        return redirect()->route("testexam")->with('error', 'You should pass the exam with a score > ' . $result_exam->result . '% your score = '.round($perCent) . '%');
    }
}
