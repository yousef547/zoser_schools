<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\static_page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class static_pagesContoller extends Controller
{
    public function index()
    {
        return view("admin.static_pages.index");
    }
    public function save(Request $request)
    {
        $page = $request->validate([
            "pageTitle" => "required|string|max:50",
            "pageActive" => ["required", Rule::in([1, 0])],
            "pageContent" => "required",
        ]);
        static_page::create($page);
        return back()->with("msg", "Successed added page");
    }
    
    public function read_page($id){
        $static_page = static_page::find($id);
        if (!$static_page) {
            return back()->with('error', 'Error ID Not Found');
        }
        // dd($static_page);
        return view("admin.static_pages.pages",compact('static_page'));
    }
}
