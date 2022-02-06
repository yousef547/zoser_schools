<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\level;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class levelController extends Controller
{
    public function index()
    {
        $levels = level::paginate(10);
        return view("admin.levels.index", compact("levels"));
    }
    public function create()
    {
        return view("admin.levels.add_level");
    }
    public function submit(Request $request)
    {
        $levels = level::count();
        $degree = [50,60,70,80];
        $request->validate([
            "lavel_name" => "required|string",
            "desc" => "required|string",
            "lowest_degree"=> Rule::in($degree),
        ]);
        $data['level'] = $levels;
        $data['lavel_name'] = $request->lavel_name;
        $data['desc'] = $request->desc;
        $data['lowest_degree'] = $request->lowest_degree;
        level::create($data);
        return redirect()->route("level")->with('msg', 'Successed Create level');
    }
    public function view($id) {
        $questions = question::where("level",$id)->get();
        // dd($questions);
        return view("admin.levels.view",compact("questions"));
    }
    public function edit($id) {
        $level = level::find($id);
        if(!$level) {
            return back()->with('error', 'this id not found');
        }
        return view("admin.levels.edit",compact("level"));
    }
    public function update($id,Request $request){
        $degree = [50,60,70,80];
        $request->validate([
            "lavel_name" => "required|string",
            "desc" => "required|string",
            "lowest_degree"=> Rule::in($degree),
        ]);
        $data['lavel_name'] = $request->lavel_name;
        $data['desc'] = $request->desc;
        $data['lowest_degree'] = $request->lowest_degree;

        $level = level::find($id);
        if(!$level) {
            return back()->with('error', 'this id not found');
        }
        $level->update($data);
        return redirect()->route("level")->with('msg', 'Successed Create level');

    }
}
