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
        Schema::table('vnpay', function (Blueprint $table) {
            $table->string('status_pay')->nullable();
            $table->string('status_transport')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vnpay', function (Blueprint $table) {
            $table->dropColumn('status_pay');
            $table->dropColumn('status_transport');
        });
    }
};
