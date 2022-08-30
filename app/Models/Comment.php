<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    
    public $guarded = [];
    protected $fillable = [
        'product_id',
        'user_id',
        'content',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
