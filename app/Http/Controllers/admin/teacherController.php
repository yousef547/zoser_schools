<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class teacherController extends Controller
{
    public function index()
    {
        $data['teachers'] = User::where('role', '=', 'teacher')->select('id', 'username', 'email', 'fullName', 'active')->get();
        // dd($data['teachers'] );
        return view('admin.teacher.index')->with($data);
    }
    public function addTeacher()
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
        // DB::table('users')->insert($teacher);
        // dd($requset->file('img'));
        // dd($password);
    }
}
