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
            $table->integer('user_id');
            $table->string('vnp_TmnCode',255)->nullable()->comment('Mã website của merchant trên hệ thống của VNPAY');
            $table->string('vnp_Amount',255)->nullable()->comment('Số tiền thanh toán');
            $table->string('vnp_BankCode',255)->nullable()->comment('Mã ngân hàng thanh toán');
            $table->string('vnp_BankTranNo',255)->nullable()->comment('Mã giao dịch tại ngân hàng');
            $table->string('vnp_CardType',255)->nullable()->comment('Loại tài khoản/thẻ khách hàng sử dụng');
            $table->string('vnp_PayDate',255)->nullable()->comment('Thời gian thanh toán');
            $table->string('vnp_OrderInfo',255)->nullable()->comment('Thông tin mô tả nội dung thanh toán');
            $table->string('vnp_TransactionNo',255)->nullable()->comment('Mã giao dịch ghi nhận tại hệ thống VNPAY');
            $table->string('vnp_ResponseCode',255)->nullable()->comment('Mã phản hồi kết quả thanh toán');
            $table->string('vnp_TransactionStatus',255)->nullable()->comment('Mã phản hồi trạng thái thanh toán');
            $table->string('vnp_TxnRef',255)->nullable()->comment('Mã tham chiếu của giao dịch tại hệ thống của merchant');
            $table->string('vnp_SecureHashType',255)->nullable()->comment('Loại mã băm');
            $table->string('vnp_SecureHash',255)->nullable()->comment('Mã kiểm tra để đảm bảo dữ liệu của giao dịch không bị thay đổi');
            $table->json('data');
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
