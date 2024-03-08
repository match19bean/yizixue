<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('商品名稱');
            $table->string('description')->nullable()->comment('商品說明');
            $table->integer('pay_time')->comment('加值時間以為單位');
            $table->integer('price')->comment('加值金額');
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
        Schema::dropIfExists('pay_products');
    }
}
