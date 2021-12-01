<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\attendance;
use App\Models\classe;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function index()
    {
        $data['classes'] = classe::where("className", "!=", "not")->get();
        return view('admin.attendance.index')->with($data);
    }
    public function takeAttendance(Request $request)
    {
        $request->validate([
            'class' => 'required|exists:classes,id',
            'section' => 'required|exists:sections,id',
            'date' => 'required|sometimes',
        ]);
        $data['dates'] = $request->date;
        $data['classe'] = classe::find($request->class);
        $data['clase'] = $request->section;
        $data['sections'] = User::where('section_id', '=', $request->section)->get();
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
            'attNotes.*' => 'nullable',
        ]);
        for ($i = 0; $i < count($request->id); $i++) {
            if (isset($request->attendance[$i])) {
                attendance::create([
                    'section_id' => $request->section,
                    'user_id' => $request->id[$i],
                    'status' => $request->attendance[$i],
                    'attNot' => $request->attNotes[$i],
                    'date' => Carbon::parse($request->date)->timestamp,
                ]);
            } else {
                attendance::create([
                    'section_id' => $request->section,
                    'user_id' => $request->id[$i],
                    'status' => 'absent',
                    'attNot' => $request->attNotes[$i],
                    'date' => Carbon::parse($request->date)->timestamp,
                ]);
            }
        }
        $request->session()->flash('msg', 'Successed Update meeting');
        return redirect('admin/attendance');
    }
    public function report()
    {
        $data['classes'] = classe::where('className', '!=', 'not')->get();
        // dd($data['classes']);
        return view('admin.attendance.report')->with($data);
    }
    public function details(Request $request)
    {
        $request->validate([
            'classId' => 'required|exists:classes,id',
            'sectionId' => 'required|exists:sections,id',
            'attendanceDayFrom' => 'required|sometimes',
            'attendanceDayTo' => 'required|sometimes',
        ]);
        // $dati =  Carbon::today();
        $data['clsse'] = classe::find($request->classId)->className;
        $start = Carbon::createFromDate($request->attendanceDayFrom);
        $end =  Carbon::createFromDate($request->attendanceDayTo);
        $dateFrom = Carbon::parse($request->attendanceDayFrom)->timestamp;
        $dateTo = Carbon::parse($request->attendanceDayTo)->timestamp;
        $data['details'] = attendance::where('date', '>=', $dateFrom)
            ->where('date', '<=', $dateTo)
            ->where('attendances.section_id', '=', $request->sectionId)
            ->distinct()->pluck('user_id');
        $data['infos'] = [];
        // 1637712000
        for($i=0;$i<count($data['details']);$i++) {
            $xx = [
                'username' => User::where('id',$data['details'][$i])->select('username','photo','id')->first(),
                'absent' => count(attendance::where('user_id',$data['details'][$i])->where('status','absent')->get()) / count(attendance::where('user_id',$data['details'][$i])->get()) * 100,
                'present' => count(attendance::where('user_id',$data['details'][$i])->where('status','present')->get()) / count(attendance::where('user_id',$data['details'][$i])->get()) * 100,
                'Late' => count(attendance::where('user_id',$data['details'][$i])->where('status','late')->get()) / count(attendance::where('user_id',$data['details'][$i])->get()) * 100,
                'Late_with_xcuse' => count(attendance::where('user_id',$data['details'][$i])->where('status','late_with_excuse')->get()) / count(attendance::where('user_id',$data['details'][$i])->get()) * 100,
                'Early_Dismissal' => count(attendance::where('user_id',$data['details'][$i])->where('status','early_dismissal')->get()) / count(attendance::where('user_id',$data['details'][$i])->get()) * 100,
                'attendance' => attendance::where('section_id',$request->sectionId)->where('user_id',$data['details'][$i])->get(),
            ];
            array_push($data['infos'],$xx);
        }
        $period = CarbonPeriod::create($start , $end );
        $data['dates'] = $period->toArray();       
        // dd(Carbon::parse($data['dates'][0])->timestamp);
        return view('admin.attendance.details')->with($data);
    }
    public function staffIndex()
    {
        return view('admin.attendance_staff.index');
    }
    public function takeStaff(Request $request)
    {
        $request->validate([
            'date' => 'required|sometimes',
            'type' => 'required|in:in,out',
        ]);
        $data['type'] = $request->type;
        $data['date'] = $request->date;
        $data['staffs'] = User::where('role_id', '!=', 1)->where('role_id', '!=', 4)
            ->select('id', 'photo', 'fullName')->get();

        // dd($date['staffs']);
        return view('admin.attendance_staff.tack_staff')->with($data);
    }
    public function staffSubmit(Request $request)
    {
        $date = Carbon::now();

        // dd($temis = Carbon::parse($date)->format(''));
        $vali = $request->validate([
            'date' => 'required|sometimes',
            'typee' => 'required|in:in,out',
            'allId' => 'required|array',
            'allId.*' => 'required|exists:users,id',
            'time' => 'nullable',
            'time.*' => 'nullable|date_format:H:i',
            'attNotes' => 'required|array',
            'attNotes.*' => 'nullable',
        ]);
        // dd($vali);
        //leave
        if ($request->typee == 'in') {
            $request->validate([
                'staff' => 'required|array',
                'staff.*' => 'required|in:present,absent,late,late_with_excuse,',
            ]);
            for ($i = 0; $i < count($request->allId); $i++) {
                $temis = $request->time[$i];
                if ($request->time[$i] == null) {
                    $temis = Carbon::parse($date)->format('H:i');
                }
                if (isset($request->staff[$i]) && $request->staff[$i] != 'absent') {
                    attendance::create([
                        'section_id' => 66,
                        'user_id' => $request->allId[$i],
                        'status' => $request->staff[$i],
                        'attNot' => $request->attNotes[$i],
                        'date' => Carbon::parse($request->date)->timestamp,
                        'in_time' => $temis
                    ]);
                } else {
                    attendance::create([
                        'section_id' => 66,
                        'user_id' => $request->allId[$i],
                        'status' => 'absent',
                        'attNot' => $request->attNotes[$i],
                        'date' => Carbon::parse($request->date)->timestamp,
                        'in_time' => null
                    ]);
                }
            }
        } else if ($request->typee == 'out') {
            $rr =  $request->validate([
                'staff' => 'nullable|array',
                'staff.*' => 'nullable|in:present,absent,late,late_with_excuse,',
            ]);
            // dd($rr);
            for ($i = 0; $i < count($request->allId); $i++) {
                $temis = $request->time[$i];
                if ($request->time[$i] == null) {
                    $temis = Carbon::parse($date)->format('H:i');
                }
                if (isset($request->staff[$i])) {
                    attendance::create([
                        'section_id' => 66,
                        'user_id' => $request->allId[$i],
                        'status' => 'leave',
                        'attNot' => $request->attNotes[$i],
                        'date' => Carbon::parse($request->date)->timestamp,
                        'out_time' => null
                    ]);
                } else {
                    attendance::create([
                        'section_id' => 66,
                        'user_id' => $request->allId[$i],
                        'status' => 'leave',
                        'attNot' => $request->attNotes[$i],
                        'date' => Carbon::parse($request->date)->timestamp,
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
