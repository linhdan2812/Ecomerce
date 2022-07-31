<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
