<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions_info extends Model
{
    use HasFactory;
    protected $table = 'questions_infos';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function random(){
        $arr =[$this->rigth_ans,$this->ans_1,$this->ans_2,$this->ans_3];
        shuffle($arr);
        return $arr;
    }

}
