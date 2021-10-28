<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\classe;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data['authUser'] = Auth::User();
        $data['classes'] = classe::where('className','!=','not')->count();
        // dd($data['classes'] );
        $data['student'] = User::where('role' , 'student')->get()->count();
        $data['teacher'] = User::where('role' , 'teacher')->get()->count();
        $data['parent'] = User::where('role' , 'parent')->get()->count();
        // dd($data['student']);
        return view('admin.home')->with($data);
    }
}
