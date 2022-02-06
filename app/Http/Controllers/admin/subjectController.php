<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\classe;
use App\Models\sections;
use App\Models\study_material;
use App\Models\subject;
use App\Models\User;
use App\Models\week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Storage;

class subjectController extends Controller
{
    use GeneralTrait;

    public function Materials()
    {
        $data['materials'] = subject::get();
        // dd($materials);
        return view('admin.materials.material')->with($data);
    }
    public function getMaterials($id)
    {
        $data['weeks'] = week::get();
        $data['sub_id'] = $id;
        // dd($stadt);

        $data['materials'] = study_material::where('subject_id', '=', $id)->join('weeks', 'week_id', '=', 'weeks.id')->select('week', 'study_materials.id', 'className', 'username', 'material_description', 'subjectTitle', 'sectionName', 'material_file', 'material_title',)
            ->join('sections', 'section_id', '=', 'sections.id')
            ->join('classes', 'class_id', '=', 'classes.id')
            ->join('subjects', 'subject_id', '=', 'subjects.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->paginate(10);
        // dd($data['materials']);
        return view('admin.materials.allmaterial')->with($data);
    }
    public function create($sub_id)
    {
        $data['id'] = $sub_id;
        $data['weeks'] = week::get();
        $data['classes'] = classe::where('className', '!=', 'not')->get();
        $data['sections'] = sections::get();
        $data['teachers'] = User::where('role', '=', 'teacher')->get();
        return view('admin.materials.create')->with($data);
    }

    public function getSection($id)
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
        // dd($request->subject_id);
        $request->validate([
            'material_title' => 'required|string|min:5|max:50',
            'material_description' => 'required|string|min:5|max:500',
            'file' => ['nullable', 'mimes:DOC,PDF,xlsx,docx,pdf'],
            'week' => "required|exists:weeks,id",
            'Class' => "required|exists:Classes,id",
            'Sections' => "required|array|exists:sections,id",
            'subject_id' => "required|exists:subjects,id",
            'teacher' => "required|exists:users,id"
        ]);
        // dd(count($request->Sections));
        if ($request->file('file') != null) {
            $path = Storage::putFile('files', $request->file('file'));
        } else {
            $path = null;
        }

        for ($i = 0; $i < count($request->Sections); $i++) {
            study_material::create([
                'week_id' => $request->week,
                'class_id' => $request->Class,
                'section_id' => $request->Sections[$i],
                'user_id' => $request->teacher,
                'subject_id' => $request->subject_id,
                'material_title' => $request->material_title,
                'material_description' => $request->material_description,
                'material_file' => $path,
            ]);
        }
        $request->session()->flash('msg', 'successfully you added new material');
        return back();
        // dd($request->all());
    }

    public function update($id, Request $request)
    {
        $data['id'] = $id;
        $data['weeks'] = week::get();
        $data['classes'] = classe::where('className', '!=', 'not')->get();
        $data['sections'] = sections::get();
        $data['teachers'] = User::where('role', '=', 'teacher')->get();
        $data['oneRow'] = study_material::find($id);
        if ($data['oneRow'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        // dd($data['oneRow']);
        return view('admin.materials.update')->with($data);
    }

    public function remove($id,Request $request) {
        $data['oneRow'] = study_material::find($id);
        if ($data['oneRow'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        $path =  $data['oneRow']->material_file;
        if ($path != null) {
            Storage::delete($path);
        } 
        $data['oneRow']->delete();
        $request->session()->flash('msg', 'successfully you deleted material');
        return back();
    }
    public function edit(Request $request)
    {

        $request->validate([
            'id'=>"required|exists:study_materials,id",
            'material_title' => 'required|string|min:5|max:50',
            'material_description' => 'required|string|min:5|max:500',
            'file' => ['nullable', 'mimes:DOC,PDF,xlsx,docx,pdf'],
            'week' => "required|exists:weeks,id",
            'Class' => "required|exists:Classes,id",
            'Sections' => "required|exists:sections,id",
            'subject_id' => "required|exists:subjects,id",
            'teacher' => "required|exists:users,id"
        ]);
        $getMaterials = study_material::find($request->id);
        $path =  $getMaterials->material_file;
        if ($request->file('file') != null) {
            Storage::delete($path);
            $path = Storage::putFile('files', $request->file('file'));
        } 
        $getMaterials->update([
            'week_id' => $request->week,
            'class_id' => $request->Class,
            'section_id' => $request->Sections,
            'user_id' => $request->teacher,
            'subject_id' => $request->subject_id,
            'material_title' => $request->material_title,
            'material_description' => $request->material_description,
            'material_file' => $path,
        ]);
        $request->session()->flash('msg', 'successfully you update new material');
        return back();
        // dd($request->all());
    }
    public function index()
    {
        $data['teachers'] = User::where('role', '=', 'teacher')->select('id', 'username')->get();

        $data['subjects'] = subject::select('id', 'subjectTitle', 'passGrade', 'finalGrade')->orderBy('id', 'desc')->paginate(5);
        $data['allTeacher'] = array();
        $teacher = DB::table('teachers')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->join('subjects', 'teachers.subject_id', '=', 'subjects.id')
            ->select('teachers.*', 'users.username', 'subjects.subjectTitle', 'role',)->get();
        for ($i = 0; $i < count($teacher); $i++) {
            if ($teacher[$i]->role == "teacher") {
                array_push($data['allTeacher'], $teacher[$i]);
            }
        }
        // dd($data['allTeacher']);

        return view('admin.materials.subjects')->with($data);
    }
    public function addSubject()
    {
        // $teacher = User::where('role' ,'=', 'teacher')->select('id','username')->get();
        // dd($teacher);
        return view('admin.materials.addsubject');
    }

    public function store(Request $request)
    {
        $subject = $request->validate([
            'subject' => 'required|string|max:50',
            'pass_grade' => 'required|integer|min:10|between:10,100',
            'final_grade' => 'required|integer|min:10|between:10,100',
        ]);
        $subjectData = array(
            'subjectTitle' => $request->subject,
            'teacherId' => '0',
            'passGrade' => $request->pass_grade,
            'finalGrade' => $request->final_grade,
            'photo' => 'no',
        );
        subject::create($subjectData);
        $request->session()->flash('msg', 'successfully you added new subject');
        return back();
    }

    public function getTeacher($id)
    {
        $teacher = DB::table('teachers')->where('subject_id', '=', $id)->get();
        return $this->returnData("data", $teacher, 'return success');

        // dd($teacher);
    }

    public function setTeacher(Request $request)
    {
        $valids = $request->validate([
            'subjectId' => 'required|integer|exists:subjects,id',
            'subjectName' => 'required|string|min:2|max:25',
            'pass' => 'required|integer|between:10,100',
            'final' => 'required|integer|between:10,100'
        ]);
        $subject = subject::where('id', $request->subjectId);
        $subject->update([
            'subjectTitle' => $request->subjectName,
            'passGrade' => $request->pass,
            'finalGrade' => $request->final
        ]);
        $teacher = $request->validate([
            'teacher' => 'required|array|exists:users,id'
        ]);


        $newTacher = array();
        for ($i = 0; $i < count($request->teacher); $i++) {
            array_push($newTacher, [
                'user_id' => $request->teacher[$i],
                'subject_id' => $request->subjectId,
            ]);
        }
        // dd($newTacher);
        DB::table('teachers')->where('subject_id', $request->subjectId)->delete();
        DB::table('teachers')->insert($newTacher);

        $request->session()->flash('msg', 'Update Successfully');
        return back();
    }
}
