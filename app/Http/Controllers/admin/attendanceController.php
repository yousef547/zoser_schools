<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\attendance;
use App\Models\classe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function index(){
        $data['classes'] = classe::where("className","!=","not")->get();
        return view('admin.attendance.index')->with($data);
    }
    public function takeAttendance(Request $request){
        $request->validate([
            'class' => 'required|exists:classes,id',
            'section' => 'required|exists:sections,id',
            'date' => 'required|sometimes',
        ]);
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
                    'attNot' => $request->attNotes[$i],
                    'date' => $request->date,
                ]);
            } else {
                attendance::create([
                    'section_id' => $request->section,
                    'user_id' => $request->id[$i],
                    'status' => 'absent',
                    'attNot' => $request->attNotes[$i],
                    'date' => $request->date,
                ]);
            }
        }
        $request->session()->flash('msg', 'Successed Update meeting');
        return redirect('admin/attendance');
    }

    public function staffIndex(){
        return view('admin.attendance_staff.index');
    }
    public function takeStaff(Request $request) {
        $request->validate([
            'date' => 'required|sometimes',
            'type' => 'required|in:in,out',
        ]);
        $data['type'] = $request->type;
        $data['date'] = $request->date;
        $data['staffs'] = User::where('role_id','!=', 1)->where('role_id','!=', 4)
        ->select('id','photo','fullName')->get();
        
        // dd($date['staffs']);
        return view('admin.attendance_staff.tack_staff')->with($data);
    }
    public function staffSubmit(Request $request) {
        $date = Carbon::now();
        
        // dd($temis = Carbon::parse($date)->format(''));
        $vali = $request->validate([
            'date' => 'required|sometimes',
            'typee'=>'required|in:in,out',
            'allId' => 'required|array',
            'allId.*' => 'required|exists:users,id',
            'time'=> 'nullable',
            'time.*'=> 'nullable|date_format:H:i',
            'attNotes' => 'required|array',
            'attNotes.*'=> 'nullable',
        ]);
        // dd($vali);
        //leave
        if($request->typee == 'in'){
            $request->validate([
                'staff' => 'required|array',
                'staff.*' => 'required|in:present,absent,late,late_with_excuse,',
            ]);
            for($i=0;$i<count($request->allId);$i++){
                $temis = $request->time[$i];
                if($request->time[$i] == null) {
                    $temis = Carbon::parse($date)->format('H:i');
                }
                if(isset($request->staff[$i]) && $request->staff[$i] != 'absent'){
                   attendance::create([
                        'section_id' => 66,
                        'user_id' => $request->allId[$i],
                        'status' => $request->staff[$i],
                        'attNot' => $request->attNotes[$i],
                        'date' => $request->date,
                        'in_time' => $temis
                    ]);
                } else {
                    attendance::create([
                        'section_id' => 66,
                        'user_id' => $request->allId[$i],
                        'status' => 'absent',
                        'attNot' => $request->attNotes[$i],
                        'date' => $request->date,
                        'in_time' => null
                    ]);
                }
            }
        } else if ($request->typee == 'out') {
           $rr=  $request->validate([
                'staff' => 'nullable|array',
                'staff.*' => 'nullable|in:present,absent,late,late_with_excuse,',
            ]);
            // dd($rr);
            for($i=0;$i<count($request->allId);$i++){
                $temis = $request->time[$i];
                if($request->time[$i] == null) {
                    $temis = Carbon::parse($date)->format('H:i');
                }
                if(isset($request->staff[$i])){
                    attendance::create([
                        'section_id' => 66,
                        'user_id' => $request->allId[$i],
                        'status' => 'leave',
                        'attNot' => $request->attNotes[$i],
                        'date' => $request->date,
                        'out_time' => null
                    ]);
                } else {
                    attendance::create([
                         'section_id' => 66,
                         'user_id' => $request->allId[$i],
                         'status' => 'leave',
                         'attNot' => $request->attNotes[$i],
                         'date' => $request->date,
                         'out_time' => $temis
                     ]);
                }
            }
        }
        $request->session()->flash('msg', 'Successed Update meeting');
        return redirect('admin/attendance/staff');
        dd($request->all());
    }
}