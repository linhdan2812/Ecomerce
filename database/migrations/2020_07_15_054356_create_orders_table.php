<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->float('sub_total');
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->float('coupon')->nullable();
            $table->float('total_amount');
            $table->integer('quantity');
            $table->enum('payment_method',['cod','paypal'])->default('cod');
            $table->enum('payment_status',['Đang xử lý','Đã thanh toán'])->default('Đang xử lý');
            $table->enum('status',['Đang xử lý','Đang vận chuyển ','Giao hàng thành công','Đã hủy'])->default('Đang xử lý');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('SET NULL');
            // $table->string('first_name');
            // $table->string('last_name');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('post_code')->nullable();
            $table->text('city');
            $table->text('district');
            $table->text('ward');
            $table->text('addressdetail');
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
        Schema::dropIfExists('orders');
    }
}
