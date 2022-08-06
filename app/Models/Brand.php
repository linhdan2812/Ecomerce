<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = ['title','slug','status'];

    public function product()
    {
        return $this->hasMany(product::class, 'brand_id');
    }
}
