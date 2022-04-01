<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\newsboard;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class boardController extends Controller
{
    public function index()
    {
        $news = newsboard::get();
        return view("admin.board.index",compact("news"));
    }
    public function view($id) {
        $newsboard = newsboard::find($id);
        if (!$newsboard) {
            return back()->with('error', 'Error ID Not Found');
        }
        return view("admin.board.view",compact("newsboard"));
    }
    public function create(){
        $roles = role::get();
        return view("admin.board.create",compact('roles'));
    }
    public function submit( Request $request)
    {
        $news = $request->validate([
            "newsTitle" => "required|string|max:50",
            "newsText" => "required|string|max:250",
            "newsFor" => "required|string|exists:roles,id",
            "newsDate" => 'required|sometimes',
            "fe_active" => ["required",Rule::in([1,0])],
            "newsImage" => ['required', 'image', 'mimes:jpeg,jpg,png,gif'],
        ]);
        $news['newsImage'] = Storage::putFile('news', $request->file('newsImage'));
        newsboard::create($news);
        return back()->with('msg', 'Successed added news board');
    }
    public function edit($id) {
        $newsboard = newsboard::find($id);
        $roles = role::get();
        if (!$newsboard) {
            return back()->with('error', 'Error ID Not Found');
        }
        return view("admin.board.edit",compact('newsboard','roles'));
    }

    public function update($id,Request $request)
    {
        $newsboard = newsboard::find($id);
        if (!$newsboard) {
            return back()->with('error', 'Error ID Not Found');
        }
        $news = $request->validate([
            "newsTitle" => "required|string|max:50",
            "newsText" => "required|string|max:250",
            "newsFor" => "required|string|exists:roles,id",
            "newsDate" => 'required|sometimes',
            "fe_active" => ["required",Rule::in([1,0])],
            "newsImage" => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
        ]);
        if($request->file('newsImage')) {
            Storage::delete($newsboard->newsImage);
            $news['newsImage'] = Storage::putFile('news', $request->file('newsImage'));
        }
        $newsboard->update($news);
        return back()->with('msg', 'Successed updated news board');
    }
    public function delete($id) {
        $newsboard = newsboard::find($id);
        if (!$newsboard) {
            return back()->with('error', 'Error ID Not Found');
        }
        Storage::delete($newsboard->newsImage);
        $newsboard->delete();
        return back()->with('msg', 'Successed delete news board');

    }
}


