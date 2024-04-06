<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQnaAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qna_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('qa_id')->comment('QnaID');
            $table->string('file_path')->nullable()->comment('附檔路徑');
            $table->string('file_name')->nullable()->comment('附檔名稱');
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
        Schema::dropIfExists('qna_attachments');
    }
}
