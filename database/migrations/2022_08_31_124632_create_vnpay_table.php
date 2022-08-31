<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnpay', function (Blueprint $table) {
            $table->id();
            $table->string('vnp_TmnCode',8)->nullable()->comment('Mã website của merchant trên hệ thống của VNPAY');
            $table->integer('vnp_Amount')->nullable()->comment('Số tiền thanh toán');
            $table->string('vnp_BankCode',3,20)->nullable()->comment('Mã ngân hàng thanh toán');
            $table->string('vnp_BankTranNo',1,255)->nullable()->comment('Mã giao dịch tại ngân hàng');
            $table->string('vnp_CardType',2,20)->nullable()->comment('Loại tài khoản/thẻ khách hàng sử dụng');
            $table->integer('vnp_PayDate')->nullable()->comment('Thời gian thanh toán');
            $table->string('vnp_OrderInfo',1,255)->nullable()->comment('Thông tin mô tả nội dung thanh toán');
            $table->integer('vnp_TransactionNo')->nullable()->comment('Mã giao dịch ghi nhận tại hệ thống VNPAY');
            $table->integer('vnp_ResponseCode')->nullable()->comment('Mã phản hồi kết quả thanh toán');
            $table->integer('vnp_TransactionStatus')->nullable()->comment('Mã phản hồi trạng thái thanh toán');
            $table->string('vnp_TxnRef',1,100)->nullable()->comment('Mã tham chiếu của giao dịch tại hệ thống của merchant');
            $table->string('vnp_SecureHashType',3,10)->nullable()->comment('Loại mã băm');
            $table->string('vnp_SecureHash',32,256)->nullable()->comment('Mã kiểm tra để đảm bảo dữ liệu của giao dịch không bị thay đổi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vnpay');
    }
};
