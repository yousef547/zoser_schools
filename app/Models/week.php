<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class week extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users() {
        return $this->belongsToMany(User::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
    public function classs() {
        return $this->belongsToMany(classe::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
    public function sections() {
        return $this->belongsToMany(sections::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
    public function Nsubjects() {
        return $this->belongsToMany(subject::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
}
