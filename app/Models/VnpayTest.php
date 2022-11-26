<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VnpayTest extends Model
{
    use HasFactory;
    protected $table = "vnpay_tests";

    protected $fillable = [
        "vnp_Version",
        "vnp_TmnCode",
        "vnp_Amount",
        "vnp_Command",
        "vnp_CreateDate",
        "vnp_CurrCode",
        "vnp_IpAddr",
        "vnp_Locale",
        "vnp_OrderInfo",
        "vnp_OrderType",
        "vnp_ReturnUrl",
        "vnp_TxnRef",
        "vnp_ExpireDate",
        "vnp_Bill_Mobile",
        "vnp_Bill_Email",
        "vnp_Bill_FirstName",
        "vnp_Bill_LastName",
        "vnp_Bill_Address",
        "vnp_Bill_City",
        "vnp_Bill_Country",
        "vnp_Inv_Phone",
        "vnp_Inv_Email",
        "vnp_Inv_Customer",
        "vnp_Inv_Address",
        "vnp_Inv_Company",
        "vnp_Inv_Taxcode",
        "vnp_Inv_Type",
        "vnp_SecureHash",
        "vnp_BankTranNo",
        "vnp_CardType",
        "vnp_PayDate",
        "vnp_TransactionNo",
        "vnp_ResponseCode",
        "vnp_TransactionStatus",
        "vnp_SecureHashType",
        "vnp_SecureHash_return",
        "user_id",
        "status_order",
        "note",
        "Status",
        "cart"
    ];
}
