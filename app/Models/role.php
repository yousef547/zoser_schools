<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function actives()
    {
        $active = count(user::where('role_id',$this->id)->where('active',1)->get());
        // dd($active);
        // $this->hasMany(User::class)
        return view('admin.allreports.report_user',compact('active'));
    }
    
    public function getPermissionsAttribute($permissions)
    {
        return json_decode($permissions , true);
    }
}
