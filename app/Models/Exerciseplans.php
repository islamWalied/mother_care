<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exerciseplans extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'duration',
        'level',
    ];
    protected $dates =["duration"];

    public function user()
    {
        return $this->belongsToMany(User::class,'mother_exercises','exercise_id','mom_id');
    }

}
