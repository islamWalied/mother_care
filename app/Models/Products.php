<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'customer_reviews',
        'image',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class,'mother_products','product_id','mom_id');
    }
    public function payment()
    {
        return $this->belongsTo(Payments::class,'pay_id');
    }
}
