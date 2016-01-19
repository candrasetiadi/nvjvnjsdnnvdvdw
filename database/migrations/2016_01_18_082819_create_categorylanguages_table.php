<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorylanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('CategoryLanguages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');
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
        Schema::drop('CategoryLanguages');
    }
}
