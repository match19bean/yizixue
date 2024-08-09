<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_columns', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ad_description')->nullable()->comment('廣告欄位文字');
            $table->text('button_text')->nullable()->comment('按鈕文字');
            $table->text('button_url')->nullable()->comment('按鈕url');
            $table->string('image_path')->comment('廣告圖');
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
        Schema::dropIfExists('ad_columns');
    }
}
