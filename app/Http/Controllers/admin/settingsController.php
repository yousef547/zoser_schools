<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class settingsController extends Controller
{
    public function index(){
        $data['user'] = Auth::user();
        return view('admin.settings.index')->with($data);
    }
    public function editProfile(Request $request){
        $data['user'] = Auth::user();
        $userE = User::find($data['user']->id);
        $request->validate([
            "fullName" => "required|string|max:50",
            "gender" => "nullable|in:male,fmale",
            "birthday" => "nullable|sometimes",
            "address" => "nullable|string|min:5|max:50",
            "zoomLink" => "nullable|url",
            "phoneNo" => "nullable|min:11",
            "mobileNo" => "nullable|min:11",
            "photo" => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            "comVia" => [
                'nullable', 'array', Rule::in(['SMS', 'Mail', 'phone']),
            ],
        ]);
        $path = $data['user']->photo;
        if ($request->hasFile('photo')) {
            Storage::delete($path);
            $path = Storage::putFile('teacher', $request->file('photo'));
        }
        $updatUser = array(
            'fullName' => $request->fullName,
            'photo' => $path,
            'gender' => $request->customRadio,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'zoomLink' => $request->zoomLink,
            'phoneNo' => $request->phoneNo,
            'mobileNo' => $request->mobileNo,
            'comVia' => json_encode($request->comVia),
        );
        $userE->update($updatUser);
        $request->session()->flash('msg', 'Successed Update Profile');
        return back();
        // dd($request->all());
    }
    public function editEmail(Request $request){
        $user = Auth::user();
        $userE = User::find($user->id);

        if ($request->email == $request->retype_email) {
            if ($request->email != $user->email) {
                $request->validate(["email" => "required|email||unique:users,email"]);
            } else {
                $request->session()->flash('msg', 'this email already exist');
                return back();
            }
            if (Hash::check($request->password, $user->password)) {
                $userE->update([
                    'email' => $request->email
                ]);
                $request->session()->flash('msg', 'Successed Update email');
                return back();
            } else {
                $request->session()->flash('error', 'password not correct');
                return back();
            }
        } else {
            $request->session()->flash('error', 'pls check retype_email');
            return back();
        }
    }
    public function editPassword(Request $request){
        $user = Auth::user();
        $userE = User::find($user->id);
        $request->validate([
            'password' => 'required|string|confirmed|min:5|max:50',
        ]);
        if (Hash::check($request->oldPassword, $user->password)) {
            $userE->update([
                'password' => Hash::make($request->password)
            ]);
            $request->session()->flash('msg', 'Successed Update Password');
            return back();
        } else {
            $request->session()->flash('error', 'password not correct');
            return back();
        }
    }
}
