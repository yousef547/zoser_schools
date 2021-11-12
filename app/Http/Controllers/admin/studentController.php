<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\studentResource;
use App\Models\classe;
use App\Models\sections;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Mockery\Undefined;

class studentController extends Controller
{
    use GeneralTrait;

    public function getStudent() {
        $data['students'] = User::where('role' , 'student')->paginate(10);
        $data['classes'] = classe::where('className', '!=', 'not')->get();
        $data['sections'] = sections::where('sectionName', '!=', 'not')->get();

        // dd($data['sections']);
        return view('admin.student.student')->with($data);
    }
    public function activation( $id, Request $request ){
        $user = User::find($id);
        if($user == null) {
            $request->session()->flash('error', 'error in id ');
            return back();
        }
        $user->where('id', $id)->update([
            'active' => !$user->active,
        ]);
        $request->session()->flash('msg', 'row updated successfully');
         return back();
    }

    public function sections($id) {
        $sections = sections::where('classe_id','=', $id)->get();
        if($sections->isEmpty()) {
            return response()->json([
                'msg' => 'not found Id '
            ] );
        }
        return response()->json($sections );
    }

    public function studentApi($gender,$class,$section) {
        $student = User::where('role' , 'student')->get();
            if($gender != "undefined" and $class > 0 && $section > 0){
                $studentC = $student->where('gender', $gender);
                $studentS = $studentC->where('section_id', $section);
            } elseif($gender == "undefined" and $class > 0 && $section > 0){
                $studentS = $student->where('section_id', $section);
            } elseif($gender == "undefined" and $class > 0 && $section == 0) {
                $studentS = $student->where('classs_id', $class);
            }elseif($gender != "undefined" and $class > 0 && $section == 0) {
                $studentC = $student->where('gender', $gender);
                $studentS = $studentC->where('classs_id', $class);
            }elseif($gender != "undefined" and $class == 0 && $section == 0) {
                $studentS = $student->where('gender', $gender);
            }else{
                return $this->returnError('404', 'error not found');
            }
            return $this->returnData("data",studentResource::collection($studentS),'return success');
        
      
        // $student = User::where('role' , 'student')->get();
    }

    public function editActive( $id){
        $user = User::find($id);
        if($user == null) {
            return $this->returnError('404', 'error not found');
        }
        $user->where('id', $id)->update([
            'active' => !$user->active,
        ]);
         return $this->returnSuccessMessage(500,'Success Eidt');
    }
}
