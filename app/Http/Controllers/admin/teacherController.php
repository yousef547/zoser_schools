<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\setting;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\View;

class teacherController extends Controller
{
    use GeneralTrait;
    public function index(Request $request)
    {
        $data['allTeachers'] = User::where('role', '=', 'teacher')->select('id', 'username', 'isLeaderBoard', 'birthday', 'role', 'gender', 'address', 'phoneNo', 'mobileNo', 'email', 'fullName', 'active', 'photo')->orderBy('username', 'desc')->paginate(10);
        $request->session()->put('keyteacher', $data['allTeachers']);
        $data['teachers'] = $request->session()->get('keyteacher');
        return view('admin.teacher.index')->with($data);
    }
    public function addTeacher(Request $request)
    {
        return view('admin.teacher.teacher');
    }
    public function store(Request $requset)
    {
        $teacherValid =  $requset->validate([
            "username" => "required|string|max:50",
            "fullName" => "required|string|max:50",
            "email" => "required|email|unique:users,email",
            "password" => ['required', 'min:6'],
            "customRadio" => "nullable|in:male,fmale",
            "birthday" => "nullable|sometimes",
            "address" => "nullable|string|min:10|max:50",
            "zoomLink" => "nullable|url",
            "phoneNo" => "nullable|min:11",
            "mobileNo" => "nullable|min:11",
            "biometric_id" => "nullable|integer",
            "user_position" => "nullable|string|min:5|max:50",
            "img" => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            "communication" => [
                'nullable', 'array', Rule::in(['SMS', 'Mail', 'phone']),
            ],
        ]);
        if ($requset->file('img') != null) {
            $path = Storage::putFile('teacher', $requset->file('img'));
        } else {
            $path = null;
        }

        $passwordHash = Hash::make($requset->password);
        $teacher = array(
            'username' => $requset->username,
            'email' => $requset->email,
            'password' => $passwordHash,
            'fullName' => $requset->fullName,
            'role' => 'teacher',
            'role_id' => 5,
            'class_id' => 15,
            'section_id' => 66,
            'photo' => $path,
            'gender' => $requset->customRadio,
            'birthday' => $requset->birthday,
            'address' => $requset->address,
            'zoomLink' => $requset->zoomLink,
            'phoneNo' => $requset->phoneNo,
            'mobileNo' => $requset->mobileNo,
            'biometric_id' => $requset->biometric_id,
            'user_position' => $requset->user_position,
            'comVia' => json_encode($requset->communication),
        );
        User::create($teacher);
        return view('admin.teacher');
        // DB::table('users')->insert($teacher);
        // dd($requset->file('img'));
        // dd($password);
    }
    public function editActive($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return $this->returnError('404', 'error not found');
        }
        $user->where('id', $id)->update([
            'active' => !$user->active,
        ]);
        return $this->returnSuccessMessage(500, 'Success Eidt');
    }
    public function leaderBoard(Request $request)
    {
        $request->validate([
            "id" => "required|exists:users,id",
            "massage" => "required|string|max:500",
        ]);
        User::where('id', '=', $request->id)->update([
            'isLeaderBoard' => $request->massage,
        ]);
        return back();
    }

    public function deleteLeader($id, Request $request)
    {
        $user = User::find($id);
        if ($user == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        User::where('id', '=', $id)->update([
            'isLeaderBoard' => null,
        ]);
        $request->session()->flash('msg', 'Delete successed ');
        return back();
    }
    public function editTeacher($id, Request $request)
    {
        $IdTeacher['infoId'] = $id;
        $IdTeacher['user'] = User::find($id);
        if ($IdTeacher['user'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        // dd($IdTeacher['user']);
        return view('admin.teacher.editteacher')->with($IdTeacher);
    }
    public function uptate(Request $request)
    {
        $teacherValid =  $request->validate([
            "id" => "required|exists:users,id",
            "username" => "required||max:50",
            "fullName" => "required|string|max:50",
            "email" => "required|email",
            "password" => ['nullable', 'min:6'],
            "customRadio" => "nullable|in:male,fmale",
            "birthday" => "nullable|sometimes",
            "address" => "nullable|string|min:10|max:50",
            "zoomLink" => "nullable|url",
            "phoneNo" => "nullable|min:11",
            "mobileNo" => "nullable|min:11",
            "biometric_id" => "nullable|integer",
            "user_position" => "nullable|string|min:5|max:50",
            "img" => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            "communication" => [
                'nullable', 'array', Rule::in(['SMS', 'Mail', 'phone']),
            ],
        ]);
        $userImg = User::findOrFail($request->id);
        $path = $userImg->photo;
        if ($request->hasFile('img')) {
            Storage::delete($path);
            $path = Storage::putFile('teacher', $request->file('img'));
        }

        $passwordHash = Hash::make($request->password);
        $teacher = array(
            'username' => $request->username,
            // ,
            'password' => $passwordHash,
            'fullName' => $request->fullName,
            'photo' => $path,
            'gender' => $request->customRadio,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'zoomLink' => $request->zoomLink,
            'phoneNo' => $request->phoneNo,
            'mobileNo' => $request->mobileNo,
            'biometric_id' => $request->biometric_id,
            'user_position' => $request->user_position,
            'comVia' => json_encode($request->communication),
        );
        if ($request->email != $userImg->email) {
            $request->validate(["email" => "required|email||unique:users,email",]);
            $userImg->update(['email' => $request->email]);
        }
        $userImg->update($teacher);
        $request->session()->flash('msg', 'Successed Update');
        return back();
    }
    public function delete($id) {
        $user = User::find($id);
        if ($user == null) {
            return $this->returnError('404', 'error not found');
        }
        DB::table('teachers')->where('user_id','=',$id)->delete();
        $user->delete();
        return $this->returnSuccessMessage(500, 'Success Delete');
    }

    public function searchGender(Request $request){
        $request->validate([
            'gender' => "required|in:male,fmale",
        ]);
        $data['getnderTeacher'] = User::where('role','=','teacher')->where('gender','=',$request->gender)->select('id', 'username', 'isLeaderBoard', 'birthday', 'role', 'gender', 'address', 'phoneNo', 'mobileNo', 'email', 'fullName', 'active', 'photo')->get();
        $request->session()->put('keyteacher', $data['getnderTeacher'] );
        $data['teachers'] = $request->session()->get('keyteacher');
        return view('admin.teacher.filters')->with($data);
    }



}
