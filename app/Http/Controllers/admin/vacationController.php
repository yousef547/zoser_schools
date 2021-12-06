<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class vacationController extends Controller
{
    public function request()
    {
        return view('admin.vacation.request');
    }
    public function submit(Request $request)
    {
        $datas = $request->validate([
            "from" => "required|sometimes",
            "to" => "required|sometimes",
        ]);
        $aar = [
            "userid" => Auth::user()->id,
            "role" => Auth::user()->role,
            "startVac" => Carbon::parse($request->from)->timestamp,
            "endVac" => Carbon::parse( $request->to)->timestamp,
            "acYear" => 1,
            "acceptedVacation" => -1,
        ];
            // dd($datas);
        vacation::create($aar);
        $request->session()->flash('msg', 'Successed create vacation');
        return back();
    }
    public function approve(){
        $data['vacations'] = vacation::
        join('users','users.id','vacations.userid')
        ->select('vacations.*','users.username','users.email')
        ->get();
        // dd($data['vacations']);
        return view("admin.vacation.approve")->with($data);
    }


    public function approveVacation($id,$aprove,Request $request){
        $vacation = vacation::find($id);
        // dd($vacation);
        if ($vacation == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        if($aprove == 0 || $aprove == 1){
            $vacation->update(["acceptedVacation"=>$aprove]);
        } else {
            $request->session()->flash('error', 'not aprrove');
            
        }
        $request->session()->flash('msg', 'Successed approve');
        return back();
    }
    public function myVacations() {
        $data['myVacation'] = vacation::where("userid",Auth::user()->id)->get();
        // dd($myVacation);
        return view("admin.vacation.myvacation")->with($data);
    }
}
