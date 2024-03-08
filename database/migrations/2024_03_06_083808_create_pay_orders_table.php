<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('USER ID');
            $table->unsignedInteger('pay_product_id')->comment('加值ID');
            $table->integer('order_status')->default('1')->comment('1:新訂單2:已取消3:confirm_ERROR4:已完成');
            $table->string('transactionId')->nullable()->comment('LinePay TransactionId');
            $table->string('remark')->nullable()->comment('記錄VIP延長時間');
            $table->boolean('is_sandbox')->nullable()->comment('是否為測試金流');
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
        Schema::dropIfExists('pay_orders');
    }
}
