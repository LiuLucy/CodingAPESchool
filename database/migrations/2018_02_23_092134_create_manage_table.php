<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('group_id');
          $table->string('name');
          $table->string('username')->unique();
          $table->string('password');
          $table->string('email')->unique();
          $table->string('phone');
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
          Schema::drop('manage');
    }
}
