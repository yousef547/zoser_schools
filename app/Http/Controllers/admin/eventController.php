<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class eventController extends Controller
{
    public function index()
    {
        $data['events'] = events::get();
        return view('admin.event.index')->with($data);
    }
    public function create()
    {
        return view('admin.event.create');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:50',
            'description' => 'required|string|min:10|max:2000',
            'Place' => 'required|string|min:2|max:30',
            "eventFor" => "required|in:all,student,teacher,parent",
            'date' => 'required|sometimes',
            'img' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            'visible' => "required|in:0,1",
        ]);
        if ($request->file('img') != null) {
            $path = Storage::putFile('event', $request->file('img'));
        } else {
            $path = null;
        }
        events::create([
            "eventTitle" => $request->title,
            "eventDescription" => $request->description,
            "eventFor" => $request->eventFor,
            "enentPlace" => $request->Place,
            "eventImage" => $path,
            "active" => $request->visible,
            "eventDate" => $request->date,

        ]);
        $request->session()->flash('msg', 'successed create event ');
        return redirect('admin/event');
    }
    public function active($id, Request $request)
    {
        $event = events::find($id);
        if ($event == null) {
            $request->session()->flash('error', 'successed create event ');
            return back();
        }
        $event->where('id', $id)->update([
            'active' => !$event->active,
        ]);
        $request->session()->flash('msg', 'successed create event ');
        return back();
    }
    public function edit($id, Request $request)
    {
        $data['event'] = events::find($id);
        if ($data['event'] == null) {
            $request->session()->flash('error', 'error in ID ');
            return back();
        }
        $data['id'] = $id;
        return view('admin.event.edit')->with($data);
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:events,id',
            'title' => 'required|string|min:5|max:50',
            'description' => 'required|string|min:10|max:2000',
            'Place' => 'required|string|min:2|max:30',
            "eventFor" => "required|in:all,student,teacher,parent",
            'date' => 'required|sometimes',
            'img' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            'visible' => "required|in:0,1",
        ]);
        $event = events::find($request->id);
        $path = $event->eventImage;
        if ($request->file('img') != null) {
            Storage::delete($path);
            $path = Storage::putFile('event', $request->file('img'));
        }
        $event->update([

            "eventTitle" => $request->title,
            "eventDescription" => $request->description,
            "eventFor" => $request->eventFor,
            "enentPlace" => $request->Place,
            "eventImage" => $path,
            "active" => $request->visible,
            "eventDate" => $request->date,

        ]);
        $request->session()->flash('msg', 'successed update event ');
        return redirect('admin/event');
    }
    public function remove($id, Request $request)
    {
        $event = events::find($id);
        if ($event == null) {
            $request->session()->flash('error', 'error in ID ');
            return back();
        }
        Storage::delete($event->eventImage);
        $event->delete();
        $request->session()->flash('msg', 'successed delete event ');
        return redirect('admin/event');
    }
    public function show($id,Request $request) {
        $data['event'] = events::find($id);
        if ($data['event'] == null) {
            $request->session()->flash('error', 'error in ID ');
            return back();
        }
        return view('admin.event.show')->with($data);
    }
}

//                            {{ $levels->links('admin.inc.paginator') }}
