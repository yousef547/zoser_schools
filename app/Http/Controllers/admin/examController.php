<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\levels;
use App\Models\question as ModelsQuestion;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question;

class examController extends Controller
{
    public function index(){
  
    // dd($roles_perms);
        $levels = levels::paginate(10);
        return view("admin.levels.index",compact("levels"));
    }
    public function create(){
        return view("admin.levels.add_level");
    }
    public function submit(Request $request){
        $request->validate([
            "level"=>"required|numeric",
            "lavel_name"=>"required|string",
        ]);
        $data['level'] = $request->level;
        $data['lavel_name'] = $request->lavel_name;
        levels::create($data);
        return redirect()->route("level")->with('msg', 'Successed Create level');
    }
    public function edit($id) {
        $level = levels::find($id);
        if(!$level) {
            return back()->with('error', 'this id not found');
        }
        return view("admin.levels.edit",compact("level"));
    }
    public function update($id,Request $request){
        $level = levels::find($id);
        if(!$level) {
            return back()->with('error', 'this id not found');
        }
        $data['level'] = $request->level;
        $data['lavel_name'] = $request->lavel_name;
        $level->update($data);
        return redirect()->route("level")->with('msg', 'Successed Create level');

    }
    public function view($id) {
        $questions = ModelsQuestion::where("level",$id)->get();
        // dd($questions);
        return view("admin.levels.view",compact("questions"));
    }
}
