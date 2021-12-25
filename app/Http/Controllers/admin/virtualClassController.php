<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\class_schedule;
use App\Models\classe;
use App\Models\day;
use App\Models\sections;
use App\Models\subject;
use App\Models\User;
use App\Models\virtual_class;
use Illuminate\Http\Request;

class virtualClassController extends Controller
{
    public function index(){
        $data['sect'] = json_decode(classe::with('sections')->where('className', '!=', 'not')->get());
        // dd($virtual);
        return view('admin.virtual_class.index')->with($data);
    }
    public function timetable($id, Request $request)
    {
        $data['id'] = $id;
        $data['section'] = sections::with('classe')->find($id);
        $data['days'] = day::get();
        $data['subjects'] = subject::get();
        $data['teachers'] = User::where('role', '=', 'teacher')->get();
        $data['schedules'] = virtual_class::join('users', 'teacherId', '=', 'users.id')
            ->join('subjects', 'subjectId', '=', 'subjects.id')->select('virtual_classes.*', 'username', 'subjectTitle')->get();
       
            // dd($data['schedules']);
        if ($data['section'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        return view("admin.virtual_Class.timetable")->with($data);
    }
}
