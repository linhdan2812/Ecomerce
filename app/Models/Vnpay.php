<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vnpay extends Model
{
    use HasFactory;
    protected $table = 'vnpay';

    protected $fillable = [
        'vnp_TmnCode',
        'vnp_Amount',
        'vnp_BankCode',
        'vnp_BankTranNo',
        'vnp_CardType',
        'vnp_PayDate',
        'vnp_OrderInfo',
        'vnp_TransactionNo',
        'vnp_ResponseCode',
        'vnp_TransactionStatus',
        'vnp_TxnRef',
        'vnp_SecureHashType',
        'vnp_SecureHash'
    ];
}
