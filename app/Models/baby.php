<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baby extends Model
{
    use HasFactory;
    protected $fillable =[
      'name',
      'mom_id',
      'gender',
      'date_of_birth',
    ];

    protected $dates =["date_of_birth"];


    public function user()
    {
        return $this->belongsTo(User::class,'mom_id');
    }

}
