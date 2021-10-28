<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
       
        return view('auth.login');
    }
    public function resetPassword() {
        return view('auth.resetpassword');
    }

    public function terms() {
        return view('auth.terms');
    }
}
