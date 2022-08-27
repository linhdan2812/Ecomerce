<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'location_city';
    
    public $guarded = [];
    protected $fillable = [
        'name',
        'slug',
        'status',
        'type',
        'name_with_type',
        'code',
    ];
}
