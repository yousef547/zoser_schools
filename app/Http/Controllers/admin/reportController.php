<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class reportController extends Controller
{
    public function __construct()
    {

        if (Auth::check()) return 'NO';
    }
    public function index()
    {
        $allStudent = User::where("role_id", 1)->paginate(10);
        return view("admin.reports.index", compact('allStudent'));
    }
    public function create($id)
    {
        $studen = User::find($id);
        if (!$studen) {
            return back()->with('error', 'this id student not found');
        }
        return view("admin.reports.create", compact('studen'));
    }
    public function submit(Request $request)
    {
        $allStudent = User::where("role_id", 1)->distinct()->pluck('id');
        $arr = $request->validate([
            "user_id" => Rule::in($allStudent),
            "teilnahme" => "required|numeric|between:1,5",
            "hausausarbeiten" => "required|numeric|between:1,5",
            "sprachkompetenz" => "required|numeric|between:1,5",
            "aussprache" => "required|numeric|between:1,5",
            "grammatik" => "required|numeric|between:1,5",
            "wortschatz" => "required|numeric|between:1,5",
            "verständnis" => "required|numeric|between:1,5",
            "comment" => "nullable|string"
        ]);
        report::create($arr);
        return redirect()->route("report")->with('msg', 'Successed');
    }
    public function edit($id)
    {
        $studen = User::find($id);
        $report = report::where('user_id', $id)->first();
        // dd($report);
        if (!$studen) {
            return back()->with('error', 'this id student not found');
        }
        return view("admin.reports.edit", compact('studen', 'report'));
    }
    public function update($id, Request $request)
    {
        $report = report::find($id);
        // dd($request->all());
        $allStudent = User::where("role_id", 3)->distinct()->pluck('id');
        $arr = $request->validate([
            "user_id" => Rule::in($allStudent),
            "teilnahme" => "required|between:1,5",
            "hausausarbeiten" => "required|between:1,5",
            "sprachkompetenz" => "required|between:1,5",
            "aussprache" => "required|between:1,5",
            "grammatik" => "required|between:1,5",
            "wortschatz" => "required|between:1,5",
            "verständnis" => "required|between:1,5",
        ]);
        $report->update($arr);
        return redirect()->route("report")->with('msg', 'Successed');
    }
    public function details($id)
    {
        $student = User::find($id);
        $reports = report::where('user_id', $id)->get();
        if (count($reports) == 0) {
            return back()->with('error', 'reports not found');
        }

        return view("admin.reports.details", compact('reports', 'student'));
    }
    public function myreport()
    {
        $reports = report::where('user_id', Auth()->user()->id)->get();
        if (count($reports) == 0) {
            return back()->with('error', 'reports not found');
        }
      
        return view("admin.reports.myreports", compact('reports'));
    }
    public function myreportShow($id)
    {
        $student = User::find(Auth()->user()->id);
        $reports = report::where('user_id', Auth()->user()->id)
            ->where('id', $id)->first();
        if (!$reports) {
            return back()->with('error', 'reports not found');
        }

        return view("admin.reports.show_report", compact('reports', 'student'));
    }
    public function __destruct()
    {
    }
}
