<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\exam;
use App\Models\info;
use App\Models\level;
use App\Models\question;
use App\Models\questions_info;
use App\Models\test_level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class examsController extends Controller
{
    public function index()
    {

        $getLevel = level::get();
        $inExam = exam::where("user_id", Auth::user()->id)->get();
        if (count($inExam) != count($getLevel)) {
            for ($i = 0; $i < count($getLevel); $i++) {
                if ($getLevel[$i]->lavel_name == "placement_test") {
                    $degree = 1;
                } else {
                    $degree = null;
                }
                if (count($inExam) == 0) {
                    $arr = exam::create([
                        "user_id" => Auth::user()->id,
                        "level_id" => $getLevel[$i]->level,
                        "degree" => $degree
                    ]);
                } elseif (!isset($inExam[$i])) {
                    $arr = exam::create([
                        "user_id" => Auth::user()->id,
                        "level_id" => $getLevel[$i]->level,
                        "degree" => null
                    ]);
                }
            }
        }
        $nextExam = exam::where("user_id", Auth::user()->id)->get();
        if (count($nextExam) == 0) {
            $levels = level::get();
        } else {
            $levels = level::join("exams", "exams.level_id", "levels.level")
                ->where("exams.user_id", Auth::user()->id)
                ->select("levels.*", "exams.degree")
                ->get();
        }
        // dd($levels);
        // dd($getLevel);
        return view("admin.exam.index", compact('getLevel', 'inExam', 'levels'));
    }
    public function test($id)
    {
        $tests = test_level::where('level_id', $id)->get();
        // dd($tests);
        if (count($tests) == 0) {
            return back()->with('error', 'id not found ');
        }
        return view("admin.exam.show_test", compact('tests', 'id'));
    }
    public function show($level, $test)
    {
        $tests = test_level::where("level_id", $level)
            ->where("id", $test)
            ->first();
        if (!$tests) {
            return back()->with('error', 'id not found ');
        }
        $question = json_decode($tests->question_id);
        $questions = [];
        for ($i = 0; $i < count($question); $i++) {
            $oneQuestion = question::where("id", $question[$i])->first();
            array_push($questions, $oneQuestion);
        }
        $level_id = level::find($level);
        $check = exam::where("user_id", Auth::user()->id)
            ->where("level_id", $level_id->level)->first();
        if ((int)$check->degree == null) {
            return back()->with('error', 'You must test the previous level');
        }

        if (count($questions) == 0) {
            return back()->with('error', ' not found any questions');
        }
        $level_id = $level;
        shuffle($questions);

        // if(user_id)
        return view("admin.exam.show", compact('questions', 'level_id', 'test'));
    }
    public function submit($level, $test, Request $request)
    {
        $levelDegree = level::find($level)->lowest_degree;
        
        $degree = 0;
        $perCent = 1;

        
        $tests = test_level::where("level_id", $level)
        ->where("id", $test)
        ->first();
        if (!$tests) {
            return back()->with('error', 'id not found ');
        }
        $question = json_decode($tests->question_id);
        $questions = [];
        for ($i = 0; $i < count($question); $i++) {
            $oneQuestion = question::where("id", $question[$i])->first();
            array_push($questions, $oneQuestion);
        }
        
        // dd($questions);

        // $questions = question::where("level", $level)->get();
        if (count($questions) == 0) {
            return back()->with('error', 'this id not found');
        }
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
            for($i=0;$i<count($rightAnswer);$i++){
                if (isset($request->answer[$y])) {
                    if ($request->answer[$y] == $rightAnswer[$i]->rigth_ans) {
                        $degree++;
                    }
                }
            }
        }
        $level_id = level::find($level);
        $exam = exam::where("level_id", $level_id->level)
            ->where("user_id", Auth::user()->id)->first();
        if ($degree != 0) {
            $perCent = ($degree / count($rightAnswer)) * 100;
        }
        if($exam->degree < $perCent) {
            $exam->update([
                "test_id"=>$test,
                "degree" => round($perCent),
            ]);
        }
        $nextExam = exam::where("user_id", Auth::user()->id)->where("level_id", $level_id->level + 1)->first();
        if ($perCent >= $levelDegree) {
            $nextExam->update([
                "degree" => 1,
            ]);
            return redirect()->route("exam")->with('msg', 'You passed the exam successfully with a score of ' . round($perCent) . '%');
        }
        if ($degree == 0) {
            $perCent = 0;
        }
        return redirect()->route("exam")->with('error', 'You failed the exam with a score of ' . round($perCent) . '% you should get lowest_degree ' . $levelDegree .'%');
        // dd($exam);
    }
}
