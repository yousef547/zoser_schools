<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\grade_level;
use Illuminate\Http\Request;

class GradelevelsController extends Controller
{
    public function index() {
        $data['levels'] = grade_level::paginate(5);
        // dd($data['level']);
        return view('admin.gradelavels.index')->with($data);
    }
    public function create(Request $request) {
        $lavels = $request->validate([
            "gradeName" => "required|string|max:5",
            "gradeDescription" =>"required|string|min:5|max:50",
            "gradePoints"=>"required|integer|between:1,100",
            "gradeFrom"=>"required|integer|between:1,100",
            "gradeTo"=>"required|integer|between:1,100",
        ]);
        grade_level::create($lavels);
        $request->session()->flash('msg', 'successfully you added new Grade levels');
        return back();
    }
    public function update(Request $request){
        $lavels = $request->validate([
            "id"=>"required|string|exists:grade_levels,id",
            "gradeName" => "required|string|max:5",
            "gradeDescription" =>"required|string|min:5|max:50",
            "gradePoints"=>"required|integer|between:1,100",
            "gradeFrom"=>"required|integer|between:1,100",
            "gradeTo"=>"required|integer|between:1,100",
        ]);
        $updateLavel = grade_level::find($request->id);
        $updateLavel->update($lavels);
        $request->session()->flash('msg', 'successfully you Update Grade levels');
        return back();
    }
    public function remove($id,Request $request) {
        $deleteLavel = grade_level::find($id);
        if ($deleteLavel == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        $deleteLavel->delete();
        $request->session()->flash('msg', 'successfully you Remove Grade levels');
        return back();
    }
}
