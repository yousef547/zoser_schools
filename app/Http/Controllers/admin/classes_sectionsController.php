<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\classe;
use App\Models\sections;
use App\Models\subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class classes_sectionsController extends Controller
{
    public function classes(){
        $data['classes'] = classe::where('className','!=','not')->paginate(5);
        return view("admin.classes&sections.classes")->with($data);
    }
    public function create(){
        $data['teachers'] = User::where('role','=','Teacher')->get();
        $data['subjects'] = subject::get();
        return view('admin.classes&sections.create')->with($data);
    }
    public function submit(Request $request){
        $newClass = $request->validate([
            "className" => "required|string|max:50",
            "classTeacher" => "required|array|exists:users,id",
            "classSubjects" => "required|array|exists:subjects,id",
        ]);
        // dd($request->all());
        classe::create([
            "className" => $request->className,
            "classTeacher" => json_encode( $request->classTeacher),
            "classSubject" => json_encode( $request->classSubjects),
        ]);
        $request->session()->flash('msg', 'Successed create new Class');
        return redirect('admin/classes');
    }
    public function edit($id,Request $request){
        $data['classe'] = classe::find($id);
        if ($data['classe'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        // dd(json_decode( $data['classe']->classTeacher));
        $data['subjects'] = subject::get();
        $data['teachers'] = User::where('role','=','Teacher')->get();
        return view('admin.classes&sections.edit')->with($data);
    }
    public function update($id,Request $request){
        $newClass = $request->validate([
            "className" => "required|string|max:50",
            "classTeacher" => "required|array|exists:users,id",
            "classSubjects" => "required|array|exists:subjects,id",
        ]);
        $classe = classe::find($id);
        if ($classe == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        // dd($request->all());
        
        $classe->update([
            "className" => $request->className,
            "classTeacher" => json_encode( $request->classTeacher),
            "classSubject" => json_encode( $request->classSubjects),
        ]);
        $request->session()->flash('msg', 'Successed update Class');
        return redirect('admin/classes');
    }
    public function delete($id,Request $request){
        $classe = classe::find($id);
        if ($classe == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        // dd();
        if(count(User::where('class_id',$id)->get()) == 0 && count(sections::where('class_id',$id)->get()) == 0) {
            
            $classe->delete();
            $request->session()->flash('msg', 'Successed delete Class');
            return redirect('admin/classes');
        }
        $request->session()->flash('error', 'you can\'t delete ');
            return back();
    }
    public function section(){
        $data['sections'] = sections::where('sectionName','!=','not')
        ->join('classes','sections.classe_id','classes.id')->select('sections.*','classes.className')
        ->paginate(5);
        // dd($data['sections']);
        return view('admin.classes&sections.sections')->with($data);
    }

    public function insert(){
        $data['classes'] = classe::where('className','!=','not')->get();
        $data['teachers'] = User::where('role','=','Teacher')->get();
        // dd($data['teachers']);
        return view('admin.classes&sections.insert')->with($data);
    }

    public function submitSection(Request $request){
        $newClass = $request->validate([
            "sectionName" => "required|string|max:50",
            "sectionTitle" => "required|string|max:50",
            "classes" => "required|exists:classes,id",
            "sectionTeacher" => "required|array|exists:users,id",
        ]);
        // dd($newClass);
        sections::create([
            "sectionName" => $request->sectionName,
            "sectionTeacher" => json_encode( $request->sectionTeacher),
            "sectionTitle" => $request->sectionTitle,
            "classe_id" => (int)$request->classes,

        ]);
        $request->session()->flash('msg', 'Successed create sections');
        return redirect('admin/section');
    }
    public function editSection($id,Request $request){
        $data['classes'] = classe::where('className','!=','not')->get();
        $data['teachers'] = User::where('role','=','Teacher')->get();
        $data['section'] = sections::find($id);
        if ($data['section'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        return view("admin.classes&sections.editSection")->with($data);
    }
    public function edit_section($id,Request $request) {
        $newClass = $request->validate([
            "sectionName" => "required|string|max:50",
            "sectionTitle" => "required|string|max:50",
            "classes" => "required|exists:classes,id",
            "sectionTeacher" => "required|array|exists:users,id",
        ]);
        $section = sections::find($id);
        if ($section == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        $section->update([
                "sectionName" => $request->sectionName,
                "sectionTeacher" => json_encode( $request->sectionTeacher),
                "sectionTitle" => $request->sectionTitle,
                "classe_id" => (int)$request->classes,
        ]);
        $request->session()->flash('msg', 'Successed create sections');
        return back();
    }
    public function deleteSection($id,Request $request){
        $section = sections::find($id);
        if ($section == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        if(count(User::where('section_id',$id)->get()) == 0 ) {
            
            $section->delete();
            $request->session()->flash('msg', 'Successed delete section');
            return back();
        }
        $request->session()->flash('error', 'you can\'t delete ');
        return back();
    }
}
