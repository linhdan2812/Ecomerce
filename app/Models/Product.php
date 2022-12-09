<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['title', 'slug', 'summary', 'description', 'photo', 'stock', 'size', 'status', 'price', 'discount', 'category_id','style'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function comment(){
        return $this->hasMany('Comment::class', 'product_id');
    }
}
