<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestOrder extends Model
{
    use HasFactory;
    protected $table = 'request_orders';
    protected $fillable = [
        'id_user',
        'id_order',
        'image',
        'note',
        'type',
        'name_product',
        'status'
    ];
}
