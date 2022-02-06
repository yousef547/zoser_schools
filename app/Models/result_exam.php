<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result_exam extends Model
{
    use HasFactory;
    protected $table = 'result_exam';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
