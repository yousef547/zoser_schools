<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class levels extends Model
{
    use HasFactory;
    protected $table = 'levels';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function exam(){
        return $this->belongsToMany(exam::class)->withPivot('user_id','level_id','degree')->withTimestamps();
    }
    public function section()
    {
        return $this->belongsToMany(User::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
 
}
