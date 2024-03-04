<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNicknameEmailPhoneLineTimePlaceAmountToQa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_answer', function (Blueprint $table) {
            $table->string('email')->comment('email');
            $table->string('phone')->nullable()->comment('聯絡電話');
            $table->string('line')->nullable()->comment('line');
            $table->string('contact_time_end')->nullable()->comment('聯絡時間');
            $table->string('place')->nullable()->comment('聯絡地點');
            $table->integer('amount_down')->comment('金額下限');
            $table->integer('amount_up')->comment('金額上限');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_answer', function (Blueprint $table) {
            $table->dropColumn(['email', 'phone', 'line', 'contact_time_end', 'place', 'amount_down', 'amount_up']);
        });
    }
}
