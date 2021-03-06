<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostcategorylanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('PostCategoryLanguages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('locale')->index();
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
        Schema::drop('PostCategoryLanguages');
    }
}
