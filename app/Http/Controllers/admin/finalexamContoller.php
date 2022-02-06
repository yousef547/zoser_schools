<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\finalexam;
use App\Models\level;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class finalexamContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    } //---End of Function Constructor

    public function index()
    {
        $allexam = finalexam::get();
        return view("admin.final_exam.index", compact('allexam'));
    }
    public function save(Request $request)
    {
        $exam = $request->validate([
            "exam_name" => "required|string",
            "exam_desc" => "required|string",
        ]);
        finalexam::create($exam);
        return back()->with('msg', 'Successed');
    }
    public function add($id)
    {
        $levels = level::get();
        $allexam = finalexam::find($id);
        if($allexam->question_ids != null){
            $arrQuestions = json_decode($allexam->question_ids);
        }else {
            $arrQuestions = [];
        }

        if (!$allexam) {
            return back()->with('error', 'this id not found');
        }
        $questions = question::get();
        // dd($questions['data'][0]['id']);
        return view("admin.final_exam.add", compact('questions', 'id', 'arrQuestions', 'levels'));
    }
    public function submit(Request $request)
    {
        $allExam = finalexam::distinct()->pluck('id');
        $request->validate([
            "exam_id" => Rule::in($allExam),
            "question" => "required|array",
            "question.*" => "required",
        ]);
        $exam = finalexam::find($request->exam_id);
        $arrExam = $request->question;
        $url = url()->previous();
        $check_str = str_contains($url, 'home/finalexam/filter?_token=');
        if ($check_str) {
            $arrs = $request->question;
            $requestArrs = json_decode($exam->question_ids);
            for($i=0;$i<count($arrs);$i++){
                if(in_array($arrs[$i],$requestArrs) != true) {
                    array_push($requestArrs,$arrs[$i]);
                }
            }
            $arrExam =$requestArrs;
        }
       
        $exam->update([
            "question_ids" => $arrExam,
        ]);
        return back()->with('msg', 'Successed Added Questions');
    }
    public function show($id)
    {
        $allexam = finalexam::find($id);
        if (!$allexam || $allexam->question_ids == null) {
            return back()->with('error', 'not found id or quetions');
        }
        $questions = [];
        $id_qestions = json_decode($allexam->question_ids);
        // dd();
        for ($i = 0; $i < count($id_qestions); $i++) {
            $oneQusetion = question::find($id_qestions[$i]);
            array_push($questions, $oneQusetion);
        }
        shuffle($questions);

        // dd($questions);
        return view("admin.final_exam.show", compact('allexam', 'questions'));
    }
    public function filter(Request $request)
    {
        $allExam = finalexam::distinct()->pluck('id');
        $values = $request->validate([
            "level" => "required|exists:levels,id",
            "exam_id" => Rule::in($allExam),
        ]);
        $data['id'] = $request->exam_id;
        $data['levels'] = level::get();
        $data['allexam'] = finalexam::find($request->exam_id);
        // dd($allexam );
        $data['arrQuestions'] = json_decode($data['allexam']->question_ids);
        $data['questions'] = question::where('level', $request->level)->get();
        // return redirect()->route('finalexam.add',$request->exam_id)->with($data);
        return view("admin.final_exam.add")->with($data);

        // dd($questions);
    }
}
