<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';
    protected $fillable = ['product_id', 'user_id', 'price',];
}
