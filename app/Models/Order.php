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
        'city',
        'district',
        'ward',
        'addressdetail',
    ];

    public function shipping(){
        return $this->hasOne(Shipping::class,'shipping_id');
    }

    public function coupon(){
        return $this->hasMany(Coupon::class , 'coupon');
    }

    public function user(){
        return $this->belongsTo(User::class,'name');
    }

}
