<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\media_albums;
use App\Models\media_item;
use App\Models\vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class mediaAlbomController extends Controller
{
    public function index()
    {
        $data['albums'] = media_albums::get();
        $data['items'] = media_item::get();

        // dd());
        return view("admin.mediaAlbum.index")->with($data);
    }
    public function upload()
    {
        return view("admin.mediaAlbum.upload");
    }
    public function submitUpload(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:50",
            "description" => "required|string|max:50",
            "image" =>  ['required', 'image', 'mimes:jpeg,jpg,png,gif'],
        ]);
        $path = Storage::putFile('album', $request->file('image'));
        media_albums::create([
            "albumTitle" => $request->title,
            "albumDescription" => $request->description,
            "albumImage" => $path,
        ]);
        $request->session()->flash('msg', 'Successed upload Album');
        return redirect('admin/media');
        // dd($request->all());
    }
    public function show($id, Request $request)
    {
        $data['media'] = media_albums::find($id);
        if ($data['media'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        return view("admin.mediaAlbum.show")->with($data);
    }
    public function edit($id, Request $request)
    {
        $data['media'] = media_albums::find($id);
        if ($data['media'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        return view("admin.mediaAlbum.edit")->with($data);
    }
    public function updata($id, Request $request)
    {
        $request->validate([
            "title" => "required|string|max:50",
            "description" => "required|string|max:50",
            "image" =>  ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
        ]);
        $media = media_albums::find($id);
        if ($media == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        $path = $media->albumImage;
        if ($request->hasFile('image')) {
            Storage::delete($path);
            $path = Storage::putFile('album', $request->file('image'));
        }
        $media->update([
            "albumTitle" => $request->title,
            "albumDescription" => $request->description,
            "albumImage" => $path,
        ]);
        $request->session()->flash('msg', 'Successed update Album');
        return redirect('admin/media');
        // dd($request->all());
    }
    public function delete($id, Request $request)
    {
        $media = media_albums::find($id);
        if ($media == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        $media->delete();
        $request->session()->flash('msg', 'Successed delete Album');
        return back();
    }

    public function create()
    {
        return view("admin.itemAlbum.create");
    }

    public function submitItem(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:50",
            "description" => "required|string|max:50",
            "mediaType" => ['required', Rule::in([0, 1, 2])],
            "file" =>  ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            "linkURL" => "nullable|url",

        ]);
        if ($request->file != null && $request->linkURL != null) {
            $request->session()->flash('error', 'you must set image or url');
            return back();
        }
        $path = null;
        if ($request->file != null) {
            $path = Storage::putFile('album', $request->file('file'));
        }
        media_item::create([
            "albumId" => 0,
            "mediaType" => $request->mediaType,
            "mediaURL" => $path,
            "mediaURLThumb" => $request->linkURL,
            "mediaTitle" => $request->title,
            "mediaDescription" => $request->description,
            "mediaDate" => Carbon::now(),
        ]);
        $request->session()->flash('msg', 'Successed item Album');
        return redirect('admin/media');
    }
    public function showItem($id, Request $request)
    {
        $data['item'] = media_item::find($id);
        if ($data['item'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        return view("admin.itemAlbum.show")->with($data);
    }

    public function editItem($id,Request $request)
    {
        $data['item'] = media_item::find($id);
        if ($data['item'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        // dd($data['item']);
        return view("admin.itemAlbum.edit")->with($data);
    }
}
