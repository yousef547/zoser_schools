<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class parentController extends Controller
{
    public function index(){
        $role = role::where('role_title','parent')->first();
        // dd($role);
        $data['parents'] = User::where('role_id',$role->id)->select('fullName','email','id','username',)->get();
        // dd($parent);
        return view('admin.parent.index')->with($data);
    }
    public function create(){
        return view('admin.parent.create');
    }
    public function submit(Request $request){
        $arr = $request->validate([
            "full_name" => "required|string|max:50",
            "email" => "required|email|unique:users,email",
            "gender" => "required|in:male,fmale",
            "birth_bay" => "required|sometimes",
            "Address" => "required|string|min:10|max:50",
            "Phone_No" => "required|min:11",
            "mobile_no" => "required|min:11",
            "img" => ['required', 'image', 'mimes:jpeg,jpg,png,gif'],
            "user_name" => "required|string|max:50",
            "Password" => ['required', 'min:6'],
            "communication" => [
                'nullable', 'array', Rule::in(['SMS', 'Mail', 'phone']),
            ],
        ]);
        // dd($request->all());
        $roleId = role::where('role_title','parent')->first();
        $path = Storage::putFile('parent', $request->file('img'));
        $parent = [
            'username' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->Password),
            'fullName' => $request->full_name,
            'role' => $roleId->role_title,
            'role_id' => $roleId->id,
            'photo' => $path,
            'class_id' => 15,
            'section_id' => 66,
            'gender' => $request->gender,
            'birthday' => $request->birth_bay,
            'address' => $request->Address,
            'mobileNo' => $request->mobile_no,
            'phoneNo' => $request->Phone_No,
            'comVia' => json_encode($request->communication),
        ];
        User::create($parent);
        $request->session()->flash('msg', 'Successed Create Employee');
        return redirect('admin/parent');
        // dd($arr);


    }
}
