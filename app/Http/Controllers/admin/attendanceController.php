<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\attendance;
use App\Models\classe;
use App\Models\User;
use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function index(){
        $data['classes'] = classe::where("className","!=","not")->get();
        return view('admin.attendance.index')->with($data);
    }
    public function takeAttendance(Request $request){
        $data['dates'] = $request->date;
        $data['classe'] = classe::find($request->class);
        $data['clase'] = $request->section;
        $data['sections'] = User::where('section_id','=',$request->section)->get();
        // dd($data['sections']);
        return view('admin.attendance.take')->with($data);
    }
    public function submit(Request $request) 
    {
        $request->validate([
            'section' => 'required|exists:sections,id',
            'date' => 'required|sometimes',
            'attendance' => 'required|array',
            'attendance.*' => 'required|in:present,absent,late,late_with_excuse,early_dismissal',
            'id' => 'required|array',
            'id.*' => 'required|exists:users,id',
            'attNotes' => 'required|array',
            'attNotes.*'=> 'nullable',
        ]);
        for($i=0;$i<count($request->id);$i++){
            if(isset($request->attendance[$i])){
               attendance::create([
                    'section_id' => $request->section,
                    'user_id' => $request->id[$i],
                    'status' => $request->attendance[$i],
                    'ayyNot' => $request->attNotes[$i],
                    'date' => $request->date,
                ]);
            } else {
                attendance::create([
                    'section_id' => $request->section,
                    'user_id' => $request->id[$i],
                    'status' => null,
                    'ayyNot' => $request->attNotes[$i],
                    'date' => $request->date,
                ]);
            }
        }
        $request->session()->flash('msg', 'Successed Update meeting');
        return redirect('admin/attendance');
    }
}


// $table->id();
// $table->foreignId('section_id')->constrained();
// $table->foreignId('user_id')->constrained();
// $table->enum('status', ['present','absent','late','late_with_excuse','early_dismissal']);
// $table->string('ayyNot',255)->nullable();
// $table->date('date');
// $table->timestamps();
