<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\assignment;
use App\Models\classe;
use App\Models\sections;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class assignmentController extends Controller
{
    public function index(){
        $data['assignments'] = assignment::get();
        return view('admin.assignment.index')->with($data);
    }

    public function create(){
        $data['classes'] = classe::where('className','!=','not')->get();
        $data['subjects'] = subject::get();

        return view('admin.assignment.create')->with($data);
    }

    public function submit(Request $request){
        $request->validate([
            "AssignTitle"=>"required|string|max:250",
            "AssignDescription"=>"required|string|max:500",
            'AssignDeadLine' => 'required|sometimes',
            'file' => ['nullable', 'mimes:DOC,PDF,xlsx,docx,pdf'],
            'classId' => "required|exists:classes,id",
            'section' => "required|array|exists:sections,id",
            'subject' => "required|exists:subjects,id",
        ]);
        if($request->file('file') == null) {
            $path = null;
        } else {

            $path = Storage::putFile('assignment', $request->file('file'));
        }
        $arr =[
            "classId" => $request->classId,
            "sectionid" => json_encode($request->section),
            "subjectId" => $request->subject,
            "AssignTitle" => $request->AssignTitle,
            "AssignDescription" => $request->AssignDescription,
            "AssignFile" => $path,
            "AssignDeadLine" => $request->AssignDeadLine,
        ];
        // dd($arr);
        assignment::create($arr);
        $request->session()->flash('msg', 'Successed created assignment');
        return redirect('admin/assignments');
    }

    public function edit($id,Request $request){
        $data['classes'] = classe::where('className','!=','not')->get();
        $data['subjects'] = subject::get();
        $data['assignment'] = assignment::find($id);
        $data['sections'] = sections::where('classe_id',$data['assignment']->classId)->get();
        if ($data['assignment'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        return view('admin.assignment.edit')->with($data);
    }
    public function update($id,Request $request){
        $request->validate([
            "AssignTitle"=>"required|string|max:250",
            "AssignDescription"=>"required|string|max:500",
            'AssignDeadLine' => 'required|sometimes',
            'file' => ['nullable', 'mimes:DOC,PDF,xlsx,docx,pdf'],
            'classId' => "required|exists:classes,id",
            'section' => "required|array|exists:sections,id",
            'subject' => "required|exists:subjects,id",
        ]);
        $assignment = assignment::find($id);
        if ($assignment == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        $path = $assignment->AssignFile;
        if ($request->hasFile('file')) {
            Storage::delete($path);
            $path = Storage::putFile('teacher', $request->file('file'));
        }

        $arr =[
            "classId" => $request->classId,
            "sectionid" => json_encode($request->section),
            "subjectId" => $request->subject,
            "AssignTitle" => $request->AssignTitle,
            "AssignDescription" => $request->AssignDescription,
            "AssignFile" => $path,
            "AssignDeadLine" => $request->AssignDeadLine,
        ];
        $assignment->update($arr);
        $request->session()->flash('msg', 'Successed updated assignment');
        return redirect('admin/assignments');
    }
    public function delete($id,Request $request){
        $assignment = assignment::find($id);
        if ($assignment == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        $assignment->delete();
        $request->session()->flash('msg', 'Successed updated assignment');
        return redirect('admin/assignments');
    }
}

