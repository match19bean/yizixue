<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagePathColumnToPostCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_category', function (Blueprint $table) {
            $table->string('image_path')->nullable()->comment('主題類別圖示');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_category', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
}
