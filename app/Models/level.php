<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    use HasFactory;
    protected $table = "levels";
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function tests()
    {
        return $this->hasMany(test_level::class,'level_id');
    }

}
