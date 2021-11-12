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
    // public function scopeActive($query)
    // {
    //     return $query->where('active', 1);
    // }

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
