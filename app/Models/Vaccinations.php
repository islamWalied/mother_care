<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinations extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_vacc',
        'date_of_vacc',

    ];

    public function user()
    {
        return $this->belongsToMany(User::class,'mother_events','event_id','mom_id');
    }
}
