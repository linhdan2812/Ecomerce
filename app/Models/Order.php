<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'data',
        'payment_status',
        'status',
        'name',
        'email',
        'phone',
        'city',
        'district',
        'ward',
        'addressdetail',
        'vnp_SecureHash'
    ];

    public function shipping(){
        return $this->hasOne(Shipping::class,'id','shipping_id');
    }

    public function coupon(){
        return $this->hasMany(Coupon::class , 'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 

}
