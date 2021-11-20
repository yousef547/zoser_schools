<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\class_schedule;
use App\Models\classe;
use App\Models\day;
use App\Models\sections;
use App\Models\subject;
use App\Models\User;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class class_schedulrController extends Controller
{
    use GeneralTrait;

    public function index()
    {

        $data['sect'] = json_decode(classe::with('sections')->where('className', '!=', 'not')->get());
        // dd($data['sect']);
        return view('admin.class_schedule.index')->with($data);
    }
    public function timetable($id, Request $request)
    {
        $data['id'] = $id;
        $data['section'] = sections::with('classe')->find($id);
        $data['days'] = day::get();
        $data['subjects'] = subject::get();
        $data['teachers'] = User::where('role', '=', 'teacher')->get();
        $data['schedules'] = class_schedule::join('users', 'user_id', '=', 'users.id')
            ->join('subjects', 'subject_id', '=', 'subjects.id')->select('class_schedules.*', 'username', 'subjectTitle')->get();
       
            
        if ($data['section'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        return view("admin.class_schedule.timetable")->with($data);
    }

    public function submit(Request $request)
    {
        // dd($request->endTime);

        $schedule = $request->validate([
            "class_id" => "required|string|exists:classes,id",
            "section_id" => "required|string|exists:sections,id",
            "day_id" => "required|string|exists:days,id",
            "subject_id" => "required|string|exists:subjects,id",
            "user_id" => "required|string|exists:users,id",
            "startTime" => "required|date_format:H:i",
            "endTime" => "required|date_format:H:i|after:startTime"
        ]);
        $carbons = new Carbon();
        $start = $carbons->format($request->startTime);
        $end = $carbons->format($request->endTime);
        $newSchedule = [
            "class_id" => $request->class_id,
            "section_id" => $request->section_id,
            "day_id" => $request->day_id,
            "subject_id" => $request->subject_id,
            "user_id" => $request->user_id,
            "startTime" =>  $start,
            "endTime" => $end
        ];

        class_schedule::create($newSchedule);
        $request->session()->flash('msg', 'Successed added class schedule');
        return back();
    }

    public function update(Request $request)
    {
       
        // dd($request->all());
        // dd($request->endTime);
        $request->validate([
            "idsubject" => "required|string|exists:class_schedules,id",
        ]);
        $schedule = $request->validate([
            "class_id" => "required|string|exists:classes,id",
            "section_id" => "required|string|exists:sections,id",
            "day_id" => "required|string|exists:days,id",
            "subject_id" => "required|string|exists:subjects,id",
            "user_id" => "required|string|exists:users,id",
            "startTime" => "required|date_format:H:i",
            "endTime" => "required|date_format:H:i|after:startTime"
        ]);
        $subjectUpdate = class_schedule::find($request->idsubject);
        $subjectUpdate->update($schedule);
        $request->session()->flash('msg', 'Successed update class schedule');
        return back();
    }
    public function remove( Request $request)
    {
        $request->validate([
            "id" => "required|string|exists:class_schedules,id",
        ]);
        $schedule = class_schedule::find($request->id);
        if ($schedule == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        $schedule->delete();
        $request->session()->flash('msg', 'Successed remove class schedule');
        return back();
    }
}
