<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tips extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'content',
        'creation_date',
    ];

    protected $dates =["creation_date"];

    public function articles()
    {
        return $this->belongsTo(Articles::class,'article_id');
    }

}
