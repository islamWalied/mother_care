<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'age',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function baby()
    {
        return $this->hasMany(baby::class,'mom_id');
    }

    public function getId()
    {
        return $this->id;
    }


    public function events()
    {
        return $this->belongsToMany(Events::class,'mother_events','mom_id','event_id');
    }

    public function exercise()
    {
        return $this->belongsToMany(Exerciseplans::class,'mother_exercises','mom_id','exercise_id');
    }

    public function products()
    {
        return $this->belongsToMany(Products::class,'mother_products','mom_id','product_id');
    }


}
