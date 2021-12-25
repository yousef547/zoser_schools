<?php

namespace App\Http\Controllers\admin;
use App\Traits\GeneralTrait;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class recordController extends Controller
{
    use GeneralTrait;

    public function index() {
        return view("admin.record.index");
    }
    public function send(Request $request){
        // $this->Upload();
        $blobInput = $request->file('audio-blob');

        //save the wav file to 'storage/app/audio' path with fileanme test.wav
        // Storage::put('audio/test.wav', file_get_contents($blobInput));
    }
}
