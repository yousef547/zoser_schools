<?php

namespace App\Http\Controllers\admin;

use Ably\Auth;
use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class roleController extends Controller
{
    var $roleValue = [];
    public function __construct()
    {
        foreach (config('global.roles_perms')  as $key => $values) {
            for ($i = 0; $i < count($values); $i++) {
                array_push($this->roleValue, $key . '_' . $values[$i]);
            }
        };
    }

    public function index()
    {
        // dd(config('global.permissions'));
        $roles = role::paginate(10);
        // return $roles;
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        // dd(config('global.permissions'));
        $roles = config('global.roles_perms');
        return view('admin.role.create', compact('roles'));
    }
    public function submit(Request $request)
    {
        // dd($this->roleValue );
        $def_for = ['admin', 'parent', 'student', 'teacher', 'none'];
        $role = $request->validate([
            "role_title" => 'required|string|min:5|max:50',
            "role_description" => 'required|string|min:10|max:2000',
            "def_for" => Rule::in($def_for),
            "role_permissions" => 'nullable|array',
            "role_permissions.*" => Rule::in($this->roleValue),
        ]);
        if (!$request->role_permissions) {
            $role['permissions'] = "[]";
        } else {
            $role['permissions'] = (string)json_encode($request->role_permissions);
        }
        // dd( $role);
        role::create($role);
        return redirect()->route('role')->with('msg', 'Successed');
    }
    public function edit($id)
    {
        // dd($this->roleValue);
        $roles = config('global.roles_perms');
        $oneRole = role::find($id);
        if (!$oneRole) {
            return back()->with('error', 'this id not found');
        }
        if (count($oneRole->permissions) == 0) {
            $role_permissions = [];
        } else {
            $role_permissions = $oneRole->permissions;
        }
        // dd(count($role_permissions));
        // return response()->json($nameRole[0]) ;
        return view('admin.role.edit', compact('roles', 'oneRole', 'role_permissions', 'id'));
    }
    public function update($id, Request $request)
    {
        $def_for = ['admin', 'parent', 'student', 'teacher', 'none'];
        $role = $request->validate([
            "role_title" => 'required|string|min:5|max:50',
            "role_description" => 'required|string|min:10|max:2000',
            "def_for" => Rule::in($def_for),
            "role_permissions" => 'nullable|array',
            "role_permissions.*" => Rule::in($this->roleValue),
        ]);
        $oneRole = role::find($id);
        if (!$oneRole) {
            return back()->with('error', 'this id not found');
        }
        if (!$request->role_permissions) {
            $role['permissions'] = null;
        } else {
            $role['permissions'] = (string)json_encode($request->role_permissions);
        }
        $oneRole->update($role);
        return back()->with('msg', 'Successed');
    }
}
