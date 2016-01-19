<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertylanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('PropertyLanguages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->integer('language_id');
            $table->string('title');
            $table->string('description');
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
        Schema::drop('PropertyLanguages');
    }
}
