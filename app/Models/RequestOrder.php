<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id','id_user');
    }

    public function orderId(): HasOne
    {
        return $this->hasOne(VnpayTest::class, 'id','id_order');
    }
}
