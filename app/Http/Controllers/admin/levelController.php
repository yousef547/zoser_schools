<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\exam;
use App\Models\levels;
use App\Models\question;
use App\Models\questions_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Undefined;

class levelController extends Controller
{
    public function index()
    {
        $getLevel = levels::get();
        $inExam = exam::where("user_id", Auth::user()->id)->get();
        if(count($inExam) == 0){
            $levels = levels::get();
        } else {
            $levels = levels::join("exams","exams.level_id","levels.id")
            ->where("exams.user_id",Auth::user()->id)
            ->select("levels.*","exams.degree")
            ->get();
        }
        // dd($levels);
        if (count($inExam) != count($levels)) {
            for ($i = 0; $i < count($levels); $i++) {
                if ($levels[$i]->lavel_name == "placement_test") {
                    $degree = 1;
                } else {
                    $degree = null;
                }
                if (count($inExam) == 0) {
                    $arr = exam::create([
                        "user_id" => Auth::user()->id,
                        "level_id" => $levels[$i]->id,
                        "degree" => $degree
                    ]);
                } elseif (!isset($inExam[$i])) {
                    $arr = exam::create([
                        "user_id" => Auth::user()->id,
                        "level_id" => $levels[$i]->id,
                        "degree" => null
                    ]);
                }
            }
        }
        // dd($getLevel);
        return view("admin.exam.index", compact('getLevel','inExam','levels'));
    }
    public function show($id)
    {
        $questions = question::where("level", $id)->get();
        $check = exam::where("user_id",Auth::user()->id)
        ->where("level_id",$id)->first();
        if((int)$check->degree == null) {
            return back()->with('error', 'You must test the previous level' );

        }
        if (count($questions) == 0) {
            return back()->with('error', ' not found any questions');
        }
        $level_id = $id;

        // if(user_id)
        return view("admin.exam.show", compact('questions', 'level_id'));
    }
    public function submit($id, Request $request)
    {
        $degree = 0;
        $perCent = 1;
        $questions = question::where("level", $id)->get();
        if (count($questions) == 0) {
            return back()->with('error', 'this id not found');
        }
        $rightAnswer = [];
        for ($i = 0; $i < count($questions); $i++) {
            if ($questions[$i]->rigth_ans != null) {
                array_push($rightAnswer, $questions[$i]->rigth_ans);
            } else {
                $infoAnswer = questions_info::where("question_id", $questions[$i]->id)->get();
                for ($y = 0; $y < count($infoAnswer); $y++) {
                    array_push($rightAnswer, $infoAnswer[$y]->rigth_ans);
                }
            }
        }
        for ($y = 0; $y < count($rightAnswer); $y++) {
            if (isset($request->answer[$y])) {
                if ($rightAnswer[$y] == $request->answer[$y]) {
                    $degree++;
                }
            }
        }
        $exam = exam::where("level_id", $id)
        ->where("user_id", Auth::user()->id)->first();
        if($degree != 0){
            $perCent = ($degree/count($rightAnswer)) * 100;
        }
        $exam->update([
            "degree"=>$perCent,
        ]);
        $exam = exam::where("user_id",Auth::user()->id)->where("level_id", $id + 1)->first();
        // dd($exam);

        if($perCent > 49) {
            $exam->update([
                "degree"=>1,
            ]);
            return redirect()->route("exam")->with('msg', 'You passed the exam successfully with a score of ' .$perCent. '%');
        }
        if($degree == 0){
            $perCent = 0;
        }
        return redirect()->route("exam")->with('error', 'You failed the exam with a score of ' .$perCent. '%' );
        // dd($exam);
    }
}
