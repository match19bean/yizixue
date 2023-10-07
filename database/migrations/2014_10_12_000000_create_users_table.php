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
            $table->string('name');
            $table->string('role');
            $table->datetime('birth_day')->default('1900-01-01 00:00:00');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('line')->unique();
            $table->string('address');
            $table->string('password');
            $table->string('ispaied')->default('false'); // true/false
            $table->datetime('expired')->default('1900-01-01 00:00:00');
            $table->string('state')->default('approve'); // ban/approve
            $table->text('description')->nullable();
            //tag
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
