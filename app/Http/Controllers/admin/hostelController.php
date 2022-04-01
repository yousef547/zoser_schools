<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class hostelController extends Controller
{
    public function index()
    {
        $hostels = hostel::get();
        return view("admin.hostel.index", compact("hostels"));
    }

    public function create()
    {
        return view("admin.hostel.create");
    }
    public function submit(Request $request)
    {
        $hostel = $request->validate([
            "hostelTitle" => "required|string|max:50",
            "hostelType" => ["required", Rule::in(["girls", "mixed", "boys"])],
            "hostelAddress" => "required|string|max:50",
            "hostelManager" => "required|string|max:50",
            "managerContact" => "required|string|max:50",
            "hostelNotes" => "required|string|max:250",
            "managerPhoto" => ['required', 'image', 'mimes:jpeg,jpg,png,gif'],
        ]);
        $hostel['managerPhoto'] = Storage::putFile('hostel', $request->file('managerPhoto'));
        hostel::create($hostel);
        return back()->with("msg", "Successed added hostel");
    }
    public function edit($id)
    {
        $hostel = hostel::find($id);
        if (!$hostel) {
            return back()->with('error', 'Error ID Not Found');
        }
        return view("admin.hostel.edit", compact("hostel"));
    }
    public function update($id, Request $request)
    {
        $hostel = hostel::find($id);
        if (!$hostel) {
            return back()->with('error', 'Error ID Not Found');
        }
        $hostels = $request->validate([
            "hostelTitle" => "required|string|max:50",
            "hostelType" => ["required", Rule::in(["girls", "mixed", "boys"])],
            "hostelAddress" => "required|string|max:50",
            "hostelManager" => "required|string|max:50",
            "managerContact" => "required|string|max:50",
            "hostelNotes" => "required|string|max:250",
            "managerPhoto" => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
        ]);
        if($request->file('managerPhoto')) {
            Storage::delete($hostel->managerPhoto);
            $hostels['managerPhoto'] = Storage::putFile('hostel', $request->file('managerPhoto'));
        }
        $hostel->update($hostels);
        return back()->with("msg", "Successed updated hostel");
    }
    public function delete($id){
        $hostel = hostel::find($id);
        if (!$hostel) {
            return back()->with('error', 'Error ID Not Found');
        }
        $hostel->delete();
        return back()->with("msg", "Successed deleted hostel");
    }
}
