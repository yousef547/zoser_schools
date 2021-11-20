<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\classe;
use App\Models\meeting;
use App\Models\sections;
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class meetimgController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $data['meetings'] = meeting::get();
        return view('admin.meeting.index')->with($data);
    }
    public function create()
    {
        // $tab = DB::connection('mysql')->table('users')->get();
        // dd($tab);
        $data['sections'] = sections::where('sectionName', '!=', 'not')->get();
        $data['classes'] = classe::where('className', '!=', 'not')->get();
        return view('admin.meeting.create')->with($data);
    }
    public function filter()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters(['username'])->select('id', 'username', 'email')
            ->get();
        return $this->returnData("data", $users, 'return success');;
        // dd($users);
        // admin/meeting/filter?filter[username]=
    }
    public function sections($id)
    {
        $sections = sections::where('classe_id', '=', $id)->get();
        if ($sections->isEmpty()) {
            return response()->json([
                'msg' => 'not found Id '
            ]);
        }
        return response()->json($sections);
    }
    public function submit(Request $request)
    {

        $request->validate([
            "meeting_title" => "required|string|min:5|max:30",
            "meeting_description" => "required|string|min:5|max:30",
            "user_host" => "required|string|exists:users,username",
            "id" => "required|exists:users,id",
            "eventFor" => "required|in:admin,Teacher,student,parent",
            "class" => "nullable|array|exists:classes,id",
            "section" => "nullable|array|exists:sections,id",
            "time" => "nullable|date_format:H:i",
            "date" => "nullable|sometimes",
            "mints" => "required|integer|between:1,250",
        ]);
        $notSelect = $request->section;
        $notClass = $request->class;
        $time = Carbon::parse($request->time)->timestamp;
        $date = Carbon::parse($request->date)->timestamp;

        if ($request->class == null && $request->section == null) {
            $notSelect = [];
            $notClass = [];
        }

        if ($request->time == null && $request->date == null) {
            $time = Carbon::now()->timestamp;
            $date = Carbon::now()->timestamp;
        }
        DB::table('meetings')->insert([
            "conference_title" => $request->meeting_title,
            "conference_desc" => $request->meeting_description,
            "scheduled_date" => $date,
            "scheduled_time_start_total" => $time,
            "scheduled_time_end_total" => $time,
            "conference_duration" => $request->mints,
            "created_by" => 1,
            "user_host" => json_encode([
                'user' => $request->user_host,
                'id' => $request->id
            ]),
            "conference_target_type" => $request->eventFor,
            "conference_target_details" => json_encode([
                'class' => $notClass,
                'section' => $notSelect
            ]),
        ]);
        $request->session()->flash('msg', 'Successed add new meeting');
        return redirect('admin/meeting');
    }

    public function update($id, Request $request)
    {
        $data['users'] = meeting::find($id);
        if ($data['users'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        $data['allClass'] = $data['users']->details('class');
        $data['getSection'] = [];
        for ($i = 0; $i < count($data['allClass']); $i++) {
            $allSection = sections::where('classe_id', $data['allClass'][$i])->get();
            for ($x = 0; $x < count($allSection); $x++) {
                array_push($data['getSection'], $allSection[$x]);
            }
        }
        // $ssd = sections::where('classe_id',$data['allClass'][1])->get();
        // dd($data['users']->details('section'));

        $data['sections'] = sections::where('sectionName', '!=', 'not')->get();
        $data['classes'] = classe::where('className', '!=', 'not')->get();
        return view('admin.meeting.update')->with($data);
    }

    public function edit(Request $request)
    {
        $req = $request->validate([
            "idm" => "required|exists:meetings,id",
            "meeting_title" => "required|string|min:5|max:30",
            "meeting_description" => "required|string|min:5|max:30",
            "user_host" => "required|string|exists:users,username",
            "id" => "required|exists:users,id",
            "eventFor" => "required|in:admin,Teacher,student,parent",
            "class" => "nullable|array|exists:classes,id",
            "section" => "nullable|array|exists:sections,id",
            "time" => "nullable|date_format:H:i",
            "date" => "nullable|sometimes",
            "time_date" => "required|in:now,time",
            "mints" => "required|integer|between:1,250",
        ]);
        // dd($req);
        $meeting = meeting::findOrFail($request->idm);
        // dd($meeting);
        $notSelect = $request->section;
        $notClass = $request->class;
        $time = Carbon::parse($request->time)->timestamp;
        $date = Carbon::parse($request->date)->timestamp;

        if ($request->class == null && $request->section == null) {
            $notSelect = [];
            $notClass = [];
        }
        // dd($request->eventFor);
        if ($request->eventFor == "admin" || $request->eventFor == "Teacher") {
            $notSelect = [];
            $notClass = [];
        }
        if ($request->time == null && $request->date == null) {
            $time = Carbon::now()->timestamp;
            $date = Carbon::now()->timestamp;
        }
        if ($request->time_date == 'now') {
            $time = Carbon::now()->timestamp;
            $date = Carbon::now()->timestamp;
        }
        $arr = [
            "conference_title" => $request->meeting_title,
            "conference_desc" => $request->meeting_description,
            "scheduled_date" => $date,
            "scheduled_time_start_total" => $time,
            "scheduled_time_end_total" => $time,
            "conference_duration" => $request->mints,
            "created_by" => 1,
            "user_host" => json_encode([
                'user' => $request->user_host,
                'id' => $request->id
            ]),
            "conference_target_type" => $request->eventFor,
            "conference_target_details" => json_encode([
                'class' => $notClass,
                'section' => $notSelect
            ]),
        ];
        $meeting->update($arr);
        $request->session()->flash('msg', 'Successed Update meeting');
        return redirect('admin/meeting');
    }
    public function delete($id, Request $request)
    {
        $meeting = meeting::find($id);
        $meeting->delete();
        $request->session()->flash('msg', 'Successed Delete Meeting');
        return back();
    }
}




// mssql_connect('SQL5097.site4now.net', 'db_a7c932_goldeneagles_admin', 'YOUR_DB_PASSWORD)
