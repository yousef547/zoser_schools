<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function resetPassword() {
        return view('login.resetpassword');
    }

    public function terms() {
        return view('login.terms');
    }
}
