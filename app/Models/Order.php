<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    
    public $guarded = [];
    protected $fillable = [
        'order_number',
        'user_id',
        'sub_total',
        'shipping_id',
        'coupon',
        'total_amount',
        'quantity',
        'payment_method',
        'payment_status',
        'status',
        'name',
        'email',
        'phone',
        'address1',
        'address2',
    ];
}
