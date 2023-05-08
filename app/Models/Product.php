<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'details',
        'price',
        'quantity',
        'image_01',
        'image_02',
        'image_03',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
}
