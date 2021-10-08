<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function visitors() {
        return view('admin.office.Visitors');
    }
    public function Phone() {
        return view('admin.office.Phone');
    }
}
