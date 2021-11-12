<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\departments;
use Illuminate\Http\Request;

class departmentController extends Controller
{
    public function index(){
        $data['departs'] = departments::paginate(5);
        // dd($data['depart']);
        return view('admin.department.index')->with($data);
    }
    public function create(){
        return view('admin.department.create');
    }

    public function store(Request $requset){
        $depatment =  $requset->validate([
            "depart_title" => "required|string|max:50",
            "depart_desc" => "required|string|max:250",
        ]);
        $requset->session()->flash('msg', 'Successed Create department');
        departments::create($depatment);
        return redirect('admin/department');
    }
    public function update(Request $requset) {
        $depatment =  $requset->validate([
            "id" => "required|exists:departments,id",
            "depart_title" => "required|string|max:50",
            "depart_desc" => "required|string|max:250",
        ]);
        // dd($depatment);
        $requset->session()->flash('msg', 'Successed Create department');
        departments::where('id','=',$requset->id)->update($depatment);
        return back();
    }
}
