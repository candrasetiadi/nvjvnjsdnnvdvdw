<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('tags');
            $table->string('meta_desc');
            $table->string('title');
            $table->string('image');
            $table->string('locale')->index();
            $table->text('content');
            $table->boolean('status');
            $table->integer('category');
            $table->integer('author_id');
            $table->timeStamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('blogs');
    }
}
