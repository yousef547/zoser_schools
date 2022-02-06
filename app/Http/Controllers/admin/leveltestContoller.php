<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\level;
use App\Models\question;
use App\Models\test_level;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class leveltestContoller extends Controller
{
    public function index()
    {
        $levels = level::get();
        $tests = test_level::get();
        return view("admin.level_test.index",compact('levels','tests'));
    }
    public function submit(Request $request)
    {
        $test = $request->validate([
            "test_name"=>"required|string",
            "test_desc"=>"required|string",
            "level_id"=>"required|exists:levels,id",
        ]);
        test_level::create($test);
        return back()->with('msg', 'Successed Created Test');

        // dd($request->all());
    }
    public function add($test,$level)
    {
        $questions = question::where('level',$level)->get();
        
        $tests = test_level::where('id',$test)
        ->where('level_id',$level)->first();
        $arrQuestions = json_decode($tests->question_id);
        if(!$test || count($questions) == 0 ){
            return back()->with('error', 'not found id or quetions');
        };
        // dd($allexam);
        return view("admin.level_test.add",compact('questions','test','arrQuestions'));
    }
    public function addQusetions(Request $request)
    {
        $allExam = test_level::distinct()->pluck('id');
        $request->validate([
            "test_id"=>Rule::in($allExam),
            "question"=>"required|array",
            "question.*"=>"nullable",
        ]);
        $test = test_level::find($request->test_id);
        $arrExam = [];
        for($i=0;$i<count($request->question);$i++) {
            array_push($arrExam, (int)$request->question[$i]);
        }
        $test->update([
            "question_id"=>json_encode($arrExam),
        ]);
        return back()->with('msg', 'Successed Added Questions');
    }
    public function show($test,$level)
    {
        // $questions = question::where('level',$level)->get();
        $tests = test_level::where('id',$test)
        ->where('level_id',$level)->first();
        $arrQuestions='';
        if($tests->question_id != null){
            $arrQuestions = json_decode($tests->question_id);
        }else {
            $arrQuestions = [];
        }
        if(!$tests || count($arrQuestions) == 0 ){
            return back()->with('error', 'not found id or quetions');
        };
        $questions = [];
        for($i=0;$i<count($arrQuestions);$i++) {
            $oneQusetion = question::find($arrQuestions[$i]);
            array_push($questions,$oneQusetion);
        }
        shuffle($questions);

        return view("admin.level_test.show",compact('questions','test','arrQuestions'));
    }
}
