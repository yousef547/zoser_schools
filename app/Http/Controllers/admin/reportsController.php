<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use Illuminate\Http\Request;

class reportsController extends Controller
{
    public function index(){

        return view('admin.allreports.index');
    }

    public function reportUser(){
        $roles = role::get();
        
        // ->select('roles.*')
        // dd($roles);
        return view('admin.allreports.report_user',compact('roles'));
    }
}
