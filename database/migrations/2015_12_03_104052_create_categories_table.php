<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('thumbnail');
            $table->integer('group_id');
            $table->enum('status', ['1', '0'])->default('1');
            $table->timeStamps();
        });

        Schema::create('categories_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->string('locale')->index();
            $table->integer('category_id')->unsigned();
            $table->timeStamps();

            $table->unique(['category_id', 'locale']);
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('categories');

        Schema::drop('categories_data');
    }
}
