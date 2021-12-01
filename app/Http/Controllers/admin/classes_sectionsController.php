<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class classes_sectionsController extends Controller
{
    public function classes(){
    //    $dds = classe::find(5)->className;
        $data['classes'] = classe::where('className','!=','not')->paginate(5);
        // dd($dds);
        return view("admin.classes&sections.classes")->with($data);
    }
}
