<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'status',
        'author',
        'publication_date',
        'image',
        'category_id',
    ];

    protected $dates =["publication_date"];



    public function categories()
    {
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function tips()
    {
        return $this->hasMany(Tips::class,'article_id');
    }
}
