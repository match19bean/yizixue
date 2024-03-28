<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagePathToUniversity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('university', function (Blueprint $table) {
            $table->string('english_name')->nullable()->comment('英文名');
            $table->string('chinese_name')->nullable()->comment('中文名');
            $table->string('country')->nullable()->comment('國家');
            $table->string('area')->nullable()->comment('區域');
            $table->string('state')->nullable()->comment('州');
            $table->string('school_badge')->nullable()->comment('校徽');
            $table->string('image_path')->nullable()->comment('圖片位置');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('university', 'image_path')){
            Schema::table('university', function (Blueprint $table) {
                $table->dropColumn(['image_path']);
            });
        }
        Schema::table('university', function (Blueprint $table) {
            $table->dropColumn(['english_name', 'chinese_name', 'country', 'area', 'state', 'school_badge']);
        });
    }
}
