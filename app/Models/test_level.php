<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test_level extends Model
{
    use HasFactory;
    protected $table = 'test_level';
 
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function level()
    {
        return $this->belongsToMany(level::class,'id');
    }
}
