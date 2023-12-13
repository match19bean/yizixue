<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('role')->default('normal');
            $table->string('student_proof')->default('pending');
            $table->string('avatar')->nullable();
            $table->datetime('birth_day')->default('1900-01-01 00:00:00');
            $table->string('university');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('line')->nullable();
            $table->string('address')->nullable();
            $table->string('profile_video')->nullable();
            $table->string('profile_voice')->nullable();
            $table->string('password');
            $table->text('description')->nullable(); //簡單自我介紹
            $table->integer('rate')->default(3); //評價分數
            $table->boolean('ispaied')->default(false); //true/false
            $table->datetime('expired')->default('1900-01-01 00:00:00');
            $table->string('state')->default('approve');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
