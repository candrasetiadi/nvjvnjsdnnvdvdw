<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('PropertyFiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('file');
            $table->string('title');
            $table->string('description');
            $table->enum('type', array('image', 'video', 'pdf'));
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
        Schema::drop('PropertyFiles');
    }
}
