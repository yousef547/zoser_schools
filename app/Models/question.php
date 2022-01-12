<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function info(){
        return $this->hasMany(questions_info::class);
    }
    // {{dd($question->info[0]->question)}}
    public function random(){
        $arr =[$this->rigth_ans,$this->ans_1,$this->ans_2,$this->ans_3,];
        shuffle($arr);
        return $arr;
    }
 
}
