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
            $table->string('gender',1)->default('M');
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('parent_id')->nullable();
            $table->datetime('birthday');
            $table->string('card_id')->unique();
            $table->string('image',50)->nullable();
            $table->integer('type_id');
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
