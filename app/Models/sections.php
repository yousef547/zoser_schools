<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function classe()
    {
        return $this->belongsTo(classe::class);
    }

    
    public function weeks() {
        return $this->belongsToMany(week::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
    public function Nusers() {
        return $this->belongsToMany(User::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
    public function classes() {
        return $this->belongsToMany(classe::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
    public function Nsubjects() {
        return $this->belongsToMany(subject::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }
}
