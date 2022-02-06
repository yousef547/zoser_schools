<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    use HasFactory;
    protected $table = "info_shopify";
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
