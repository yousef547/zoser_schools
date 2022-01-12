<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\levels;
use App\Models\question;
use App\Models\questions_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class questionsController extends Controller
{
    public function index()
    {
        return view("admin.questions.index");
    }
    public function create()
    {
        $levels = levels::get();
        return view("admin.questions.create", compact("levels"));
    }
    public function choices(Request $request)
    {
        $values = $request->validate([
            "level" => "required|exists:levels,id",
            "choices" => "required",
            "rigth_ans" => "required",
            "ans_1" => "required",
            "ans_2" => "required",
            "ans_3" => "required",
        ]);
        $data =  $values;
        $data['type'] = "choices";
        question::create($data);
        return back()->with('msg', 'Successed');
    }
    public function correction(Request $request)
    {
        $values = $request->validate([
            "level" => "required|exists:levels,id",
            "true_fase" => "required",
            "rigth_ans" => "required|in:right,wrong",
        ]);
        $data =  $values;
        $data['type'] = "true_fase";
        question::create($data);
        return back()->with('msg', 'Successed');
    }
    public function recording(Request $request)
    {
        $values = $request->validate([
            "record" => "required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav",
            "level" => "required|exists:levels,id",
            "rigth_ans" => "required|in:right,wrong",
            "question" => "required|array",
            "question.*" => "required",
            "rigth_ans" => "required|array",
            "rigth_ans.*" => "required",
            "ans_1" => "required|array",
            "ans_1.*" => "required",
            "ans_2" => "required|array",
            "ans_2.*" => "required",
            "ans_3" => "required|array",
            "ans_3.*" => "required",
        ]);
        $path = Storage::putFile('record', $request->file('record'));
        $question['record'] = $path;
        $question['level'] = $request->level;
        $question['type'] = "record";
        $saveQuestion = question::create($question);
        $saveQuestion->save();
        for ($i = 0; $i < count($request->question); $i++) {
            $info['question'] = $request->question[$i];
            $info['rigth_ans'] = $request->rigth_ans[$i];
            $info['ans_1'] = $request->ans_1[$i];
            $info['ans_2'] = $request->ans_2[$i];
            $info['ans_3'] = $request->ans_3[$i];
            $info['question_id'] = $saveQuestion->id;
            questions_info::create($info);
        }
        return back()->with('msg', 'Successed');
    }
    public function vedio(Request $request)
    {
        $values = $request->validate([
            "video" => "required|mimes:mp4,mov,ogg|max:20000",
            "level" => "required|exists:levels,id",
            "rigth_ans" => "required|in:right,wrong",
            "question" => "required|array",
            "question.*" => "required",
            "rigth_ans" => "required|array",
            "rigth_ans.*" => "required",
            "ans_1" => "required|array",
            "ans_1.*" => "required",
            "ans_2" => "required|array",
            "ans_2.*" => "required",
            "ans_3" => "required|array",
            "ans_3.*" => "required",
        ]);
        $path = Storage::putFile('video', $request->file('video'));
        $question['video'] = $path;
        $question['level'] = $request->level;
        $question['type'] = "video";
        $saveQuestion = question::create($question);
        $saveQuestion->save();
        for ($i = 0; $i < count($request->question); $i++) {
            $info['question'] = $request->question[$i];
            $info['rigth_ans'] = $request->rigth_ans[$i];
            $info['ans_1'] = $request->ans_1[$i];
            $info['ans_2'] = $request->ans_2[$i];
            $info['ans_3'] = $request->ans_3[$i];
            $info['question_id'] = $saveQuestion->id;
            questions_info::create($info);
        }
        return back()->with('msg', 'Successed');
    }
    public function reading(Request $request)
    {
        $values = $request->validate([
            "reading" => "required|string",
            "level" => "required|exists:levels,id",
            "rigth_ans" => "required|in:right,wrong",
            "question" => "required|array",
            "question.*" => "required",
            "rigth_ans" => "required|array",
            "rigth_ans.*" => "required",
            "ans_1" => "required|array",
            "ans_1.*" => "required",
            "ans_2" => "required|array",
            "ans_2.*" => "required",
            "ans_3" => "required|array",
            "ans_3.*" => "required",
        ]);
        $question['reading'] = $request->reading;
        $question['level'] = $request->level;
        $question['type'] = "reading";
        $saveQuestion = question::create($question);
        $saveQuestion->save();
        for ($i = 0; $i < count($request->question); $i++) {
            $info['question'] = $request->question[$i];
            $info['rigth_ans'] = $request->rigth_ans[$i];
            $info['ans_1'] = $request->ans_1[$i];
            $info['ans_2'] = $request->ans_2[$i];
            $info['ans_3'] = $request->ans_3[$i];
            $info['question_id'] = $saveQuestion->id;
            questions_info::create($info);
        }
        return back()->with('msg', 'Successed');
    }
}
