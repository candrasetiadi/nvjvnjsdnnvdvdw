<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('thumbnail');
            $table->enum('status', ['1', '0'])->default('1');
            $table->timeStamps();
        });

        Schema::create('groups_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->string('locale')->index();
            $table->integer('group_id')->unsigned();
            $table->timeStamps();

            $table->unique(['group_id', 'locale']);
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('groups');

        Schema::drop('groups_data');
    }
}
