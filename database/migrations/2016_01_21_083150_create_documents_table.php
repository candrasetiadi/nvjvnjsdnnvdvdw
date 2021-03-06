<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('name');
            $table->string('description');
            $table->tinyinteger('is_included')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Documents');
    }
}
