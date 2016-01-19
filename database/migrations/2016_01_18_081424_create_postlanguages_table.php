<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostlanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('PostLanguages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('title');
            $table->text('content');
            $table->integer('language_id');
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
        Schema::drop('PostLanguages');
    }
}
