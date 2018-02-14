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
            $table->string('nick_name')->nullable();
            $table->tinyInteger('gender');
            $table->string('email');
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('birthday');
            $table->string('card_id');
            $table->string('image',50)->nullable();
            $table->integer('type_id')->nullable();
            $table->timestamps();
            $table->string('remember_token', 100)->nullable();
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