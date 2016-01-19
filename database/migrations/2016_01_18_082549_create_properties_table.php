<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('customer_id');
            $table->integer('category_id');
            $table->double('price');
            $table->double('discount');
            $table->enum('type', array('for sale', 'for rent'));
            $table->enum('publish', array('draft', 'moderation', 'publish'));
            $table->double('building_size');
            $table->double('land_size');
            $table->integer('floor');
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->enum('garden', array('0', '1'));
            $table->enum('pool', array('0', '1'));
            $table->enum('ac', array('0', '1'));
            $table->enum('heater', array('0', '1'));
            $table->enum('kitchen', array('0', '1'));
            $table->enum('garage', array('0', '1'));
            $table->enum('car_port', array('0', '1'));
            $table->enum('sold', array('0', '1'));
            $table->string('code');
            $table->string('status');
            $table->string('year');
            $table->string('certificate_number');
            $table->string('certificate_name');
            $table->string('certificate_type');
            $table->string('certificate_tax');
            $table->double('map_latitude');
            $table->double('map_longitude');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('slug');
            $table->integer('view');
            $table->timeStamps();
            $table->softDeletes();
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
        Schema::drop('Properties');
    }
}
