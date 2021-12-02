<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function sections()
    {
        return $this->hasMany(sections::class);
    }
    public function allTeacher()
    {
        $teacher=[];
        for($i=0;$i<count(json_decode($this->classTeacher));$i++) {
            array_push($teacher, User::find(json_decode($this->classTeacher)[$i])->username ) ;
            
        }
        return $teacher;
    }
    public function allSubject()
    {
        $Subject=[];
        for($i=0;$i<count(json_decode($this->classSubject));$i++) {
            array_push($Subject, subject::find(json_decode($this->classSubject)[$i])->subjectTitle) ;
            
        }
        return $Subject;
    }
   

    public function weeks() {
        return $this->belongsToMany(week::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
    public function Nuser() {
        return $this->belongsToMany(User::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
    public function Nsections() {
        return $this->belongsToMany(sections::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
    public function Nsubjects() {
        return $this->belongsToMany(subject::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
}
