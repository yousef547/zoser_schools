<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use App\Providers\AppServiceProvider;
class languagesController extends Controller
{
    public function index()
    {
        $langs = language::get();
        // dd($lang);
        return view("admin.languages.index", compact("langs"));
    }
    public function create()
    {
        $words = $this->languages();
        
        return view("admin.languages.create",compact('words'));
    }
    public function submit(Request $request)
    {
        $lang = $request->validate([
            "languageTitle"=>"required|string|min:5|max:50",
            "languageUniversal"=>"required|string|max:5",
            "image" => ['required', 'image', 'mimes:jpeg,jpg,png,gif'],
            "isRTL" => [
                'required', Rule::in([0,1]),
            ],
            "languagePhrases" => "required|array",
        ]);
        $lang['image'] = Storage::putFile('flags', $request->file('image'));
        $lang['languagePhrases'] = json_encode($request->languagePhrases);
        language::create($lang);
        return redirect()->route('languages')->with("msg","Successed added languages");
    }
    public function edit($id){
        
        $lang = language::find($id);
        if(!$lang) {
            return back()->with('error', 'this id not found');
        }
        // dd($lang->image);
        $words = $this->languages();
        return view("admin.languages.edit" ,compact('words','id','lang'));
    }
    public function update($id,Request $request) {
        $lang = $request->validate([
            "languageTitle"=>"required|string|min:5|max:50",
            "languageUniversal"=>"required|string|max:5",
            "image" => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            "isRTL" => [
                'required', Rule::in([0,1]),
            ],
            "languagePhrases" => "required|array",
        ]);
        $langs = language::find($id);
        if(!$langs) {
            return back()->with('error', 'this id not found');
        }
        if($request->image == null) {
            $lang['image'] = $langs->image;
        }else {
            $lang['image'] = Storage::putFile('flags', $request->file('image'));
        }
        // dd($lang);
        $lang['languagePhrases'] = json_encode($request->languagePhrases);
        $langs->update($lang);
        return back()->with("msg","Successed edited languages");
        // dd();
    }
    public function submitLang($id)
    {
        $lang = language::find($id);
        if (!$lang) {
            return back()->with('error', 'this id not found');
        }
        $user = User::find(Auth::user()->id);
        $user->update([
            "defLang" => $id,
        ]);

        return back()->with("msg", "Successed changed languages");
    }

    public function languages(){
        $defLang = Auth::user()->defLang;
        $language = language::find($defLang)->languagePhrases;
        return json_decode($language);
    }
}
