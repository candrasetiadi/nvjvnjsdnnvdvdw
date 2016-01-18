<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('thumbnail');
            $table->integer('category_id');
            $table->enum('status', ['1', '0'])->default('1');
            $table->timeStamps();
        });

        Schema::create('subcategories_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->string('locale')->index();
            $table->integer('subcategory_id')->unsigned();
            $table->timeStamps();

            $table->unique(['subcategory_id', 'locale']);
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('subcategories');

        Schema::drop('subcategories_data');
    }
}
