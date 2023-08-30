<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'location',
        'date_time',
        'organizer'
    ];
    protected $dates = ['date_time'];

    public function user()
    {
        return $this->belongsToMany(User::class,'mother_events','event_id','mom_id');
    }
}
