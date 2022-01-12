<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function level()
    {
        return $this->belongsTo(levels::class);
    }
}

