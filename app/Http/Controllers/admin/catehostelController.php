<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\hostel;
use App\Models\hostel_cat;
use Illuminate\Http\Request;

class catehostelController extends Controller
{
    public function index()
    {
        $catHostels = hostel_cat::get();
        return view("admin.catehostel.index", compact('catHostels'));
    }
    public function create()
    {
        $hostels = hostel::get();
        return view("admin.catehostel.create", compact("hostels"));
    }
    public function submit(Request $request)
    {
        $catHostel = $request->validate([
            "catTitle" => "required|string|max:100",
            "catTypeId" => "required|string|exists:hostels,id",
            "catFees" => 'required|string|max:100',
            "catNotes" => 'required|string|max:250',
        ]);
        hostel_cat::create($catHostel);
        return back()->with('msg', 'Successed added news board');
    }
    public function edit($id)
    {
        $hostel_cat = hostel_cat::find($id);
        $hostels = hostel::get();
        if (!$hostel_cat) {
            return back()->with('error', 'Error ID Not Found');
        }
        return view("admin.catehostel.edit", compact("hostel_cat", "hostels"));
    }
    public function update($id,Request $request)
    {
        $hostel_cat = hostel_cat::find($id);
        if (!$hostel_cat) {
            return back()->with('error', 'Error ID Not Found');
        }
        $catHostel = $request->validate([
            "catTitle" => "required|string|max:100",
            "catTypeId" => "required|string|exists:hostels,id",
            "catFees" => 'required|string|max:100',
            "catNotes" => 'required|string|max:250',
        ]);
        $hostel_cat->update($catHostel);
        return back()->with('msg', 'Successed updated news board');
    }
    public function delete($id) {
        $hostel_cat = hostel_cat::find($id);
        if (!$hostel_cat) {
            return back()->with('error', 'Error ID Not Found');
        }
        $hostel_cat->delete();
        return back()->with('msg', 'Successed deleted categary hostel');
    }
}
