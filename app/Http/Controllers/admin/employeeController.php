<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class employeeController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $data['allEmployee'] = User::where('role', '!=', 'student')->select('id', 'username', 'isLeaderBoard', 'birthday', 'role', 'gender', 'address', 'phoneNo', 'mobileNo', 'email', 'fullName', 'active', 'photo')->paginate(10);
        // dd($allEmployee);
        return view('admin.employee.index')->with($data);
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

    public function addEmployee()
    {
        $data['roles'] = role::all();
        // dd($roles);
        return view('admin.employee.create')->with($data);
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
            "mobileNo" => "nullable|min:11",
            "Permissions" => "required|exists:roles,id",
            "img" => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            "communication" => [
                'nullable', 'array', Rule::in(['SMS', 'Mail', 'phone']),
            ],
        ]);
        $Permission =json_decode(role::where('id','=',$requset->Permissions)->select('id',"role_title")->get());
        if ($requset->file('img') != null) {
            $path = Storage::putFile('teacher', $requset->file('img'));
        } else {
            $path = null;
        }

        $passwordHash = Hash::make($requset->password);
        $employee = array(
            'username' => $requset->username,
            'email' => $requset->email,
            'password' => $passwordHash,
            'fullName' => $requset->fullName,
            'role' => $Permission[0]->role_title,
            'role_id' => $requset->Permissions,
            'class_id' => 15,
            'section_id' => 66,
            'photo' => $path,
            'gender' => $requset->customRadio,
            'birthday' => $requset->birthday,
            'address' => $requset->address,
            'mobileNo' => $requset->mobileNo,
            'comVia' => json_encode($requset->communication),
        );
        User::create($employee);
        $requset->session()->flash('msg', 'Successed Create Employee');
        return back();
    }
    public function edit($id ,Request $request) {
        $data['roles'] = role::all();
        $data['id'] = $id;
        $data['user'] = User::find($id);
        if ($data['user'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        return view('admin.employee.edit')->with($data);
    }


    public function update(Request $requset) {
        $teacherValid =  $requset->validate([
            "id" => "required|exists:users,id",
            "username" => "required|string|max:50",
            "fullName" => "required|string|max:50",
            "password" => ['nullable', 'min:6'],
            "customRadio" => "nullable|in:male,fmale",
            "birthday" => "nullable|sometimes",
            "address" => "nullable|string|min:5|max:50",
            "mobileNo" => "nullable|min:11",
            "Permissions" => "required|exists:roles,id",
            "img" => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            "communication" => [
                'nullable', 'array', Rule::in(['SMS', 'Mail', 'phone']),
            ],
        ]);
        $Permission =json_decode(role::where('id','=',$requset->Permissions)->select('id',"role_title")->get());
        $userImg = User::findOrFail($requset->id);
        $path = $userImg->photo;
        if ($requset->hasFile('img')) {
            Storage::delete($path);
            $path = Storage::putFile('teacher', $requset->file('img'));
        }
        $passwordHash = Hash::make($requset->password);

        $employee = array(
            'username' => $requset->username,
            'password' => $passwordHash,
            'fullName' => $requset->fullName,
            'role' => $Permission[0]->role_title,
            'role_id' => $requset->Permissions,
            'class_id' => 15,
            'section_id' => 66,
            'photo' => $path,
            'gender' => $requset->customRadio,
            'birthday' => $requset->birthday,
            'address' => $requset->address,
            'mobileNo' => $requset->mobileNo,
            'comVia' => json_encode($requset->communication),
        );
        if ($requset->email != $userImg->email) {
            $requset->validate(["email" => "required|email||unique:users,email",]);
            $userImg->update(['email' => $requset->email]);
        }
        $userImg->update($employee);
        $requset->session()->flash('msg', 'Successed Create Employee');
        return back();
    }
}
