<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meeting extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user_host($host)
    {
        // $lang = $lang ?? App::getLocale();
        return json_decode($this->user_host)->$host;
    }

    public function details($name)
    {
        // $lang = $lang ?? App::getLocale();
        return json_decode($this->conference_target_details)->$name;
    }
}
