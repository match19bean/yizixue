<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYizixueFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yizixue_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('yizixue_faq_category_id')->comment('教戰守則ID');
            $table->string('title')->comment('標題');
            $table->text('content')->comment('內文')->nullable();
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
        Schema::dropIfExists('yizixue_faqs');
    }
}
