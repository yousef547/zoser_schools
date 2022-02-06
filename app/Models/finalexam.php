<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalexam extends Model
{
    use HasFactory;
    protected $table = "finel_exam";
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
