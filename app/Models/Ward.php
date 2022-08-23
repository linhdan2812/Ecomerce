<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = 'location_ward';
    
    public $guarded = [];
    protected $fillable = [
        'name',
        'slug',
        'status',
        'type',
        'name_with_type',
        'path',
        'path_with_type',
        'code',
        'parent_code',
    ];
}
