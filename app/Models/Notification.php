<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    
    public $guarded = [];
    protected $fillable = [
        'type',
        'user_id',
        'data',
        'read_at',
    ];
}
