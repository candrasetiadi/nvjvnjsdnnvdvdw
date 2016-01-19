<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('UserLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('activity');
            $table->string('data');
            $table->string('ip_address');
            $table->timeStamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('UserLogs');
    }
}
