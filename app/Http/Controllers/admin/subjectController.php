<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\GeneralTrait;

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
        return view('admin.materials.allmaterial');
    }
    public function getSubject()
    {
        $data['teachers'] = User::where('role' ,'=', 'teacher')->select('id','username')->get();
        
        $data['subjects']= subject::select('id','subjectTitle','passGrade','finalGrade')->orderBy('id', 'desc')->get();
        $data['allTeacher']= array();
        $teacher = DB::table('teachers')
        ->join('users','teachers.user_id','=','users.id')
        ->join('subjects','teachers.subject_id','=','subjects.id')
        ->select('teachers.*','users.username','subjects.subjectTitle','role',)->get();
        for($i=0;$i<count($teacher);$i++){
            if($teacher[$i]->role == "teacher"){
                array_push($data['allTeacher'],$teacher[$i]);
            }
        }
        // dd($data['teachers']);

        return view('admin.materials.subjects')->with($data);
    }
    public function addSubject(){
        // $teacher = User::where('role' ,'=', 'teacher')->select('id','username')->get();
        // dd($teacher);
        return view('admin.materials.addsubject');
    }

    public function store(Request $request ){
        $subject = $request->validate([
            'subject' => 'required|string|max:50',
            'pass_grade' => 'required|integer|min:10|between:10,100',
            'final_grade' => 'required|integer|min:10|between:10,100',
        ]);
        $subjectData = array(
        'subjectTitle' => $request->subject,
         'teacherId' => '0',
         'passGrade'=>$request->pass_grade,
         'finalGrade'=>$request->final_grade,
         'photo' => 'no',
        );
        $request->session()->flash('msg', 'successfully you added new subject');
        subject::create($subjectData);
        return back();
    }

    public function getTeacher($id){
        $teacher = DB::table('teachers')->where('subject_id','=', $id)->get();
        return $this->returnData("data",$teacher,'return success');

        // dd($teacher);
    }

    public function setTeacher(Request $request){
        $valids= $request->validate([
            'subjectId'=>'required|integer|exists:subjects,id',
            'subjectName'=>'required|string|min:2|max:25',
            'pass'=>'required|integer|between:10,100',
            'final'=>'required|integer|between:10,100'
        ]);
        $subject = subject::where('id',$request->subjectId);
        $subject->update([
            'subjectTitle' => $request->subjectName,
            'passGrade' => $request->pass,
            'finalGrade' => $request->final
        ]);
        $teacher = $request->validate([
            'teacher' =>'required|array|exists:users,id'
        ]);


        $newTacher = array();
        for($i=0;$i<count($request->teacher);$i++){
            array_push($newTacher, [
                'user_id'=>$request->teacher[$i],
                'subject_id'=>$request->subjectId,
            ]);
        }
        // dd($newTacher);
        DB::table('teachers')->where('subject_id',$request->subjectId)->delete();
        DB::table('teachers')->insert($newTacher);
      
        $request->session()->flash('msg', 'Update Successfully');
        return back();
       
    }
}
