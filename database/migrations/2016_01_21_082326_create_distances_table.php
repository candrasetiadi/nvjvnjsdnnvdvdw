<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Distances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('from');
            $table->double('value');
            $table->enum('unit', array('km','m','minutes','hours'));
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
        Schema::drop('Distances');
    }
}
