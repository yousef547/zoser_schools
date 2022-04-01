<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hostel_cat extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

}
