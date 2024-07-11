<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_carousels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_path')->comment('圖片位置');
            $table->boolean('is_active')->comment('是否啟用');
            $table->integer('sort')->default(0)->comment('圖片排序');
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
        Schema::dropIfExists('about_us_carousels');
    }
}
