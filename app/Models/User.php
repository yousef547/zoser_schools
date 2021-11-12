<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsTo(role::class);
    }

    public function class()
    {
        return $this->belongsTo(classe::class);
    }
    public function section()
    {
        return $this->belongsTo(sections::class);
    }
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function subjects()
    {
        return $this->belongsToMany(subject::class);
            // ->withPivot('subjectTitle', 'passGrade', 'finalGrade','photo')
            // ->withTimestamps();
    }

    public function weeks() {
        return $this->belongsToMany(week::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
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
    public function studys() {
        return $this->belongsToMany(study_material::class)->withPivot('material_file','material_description','material_title')->withTimestamps();
    }

}
