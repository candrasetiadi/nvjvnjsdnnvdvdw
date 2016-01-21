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
            // index
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('customer_id');
            $table->integer('category_id');

            $table->enum('currency', array('IDR', 'USD', 'EUR'));
            $table->double('price');
            $table->double('discount');
            $table->enum('type', array('for sale', 'for rent'));
            $table->enum('publish', array('draft', 'moderation', 'publish'));
            $table->double('building_size');
            $table->double('land_size');            

            $table->tinyinteger('sold');
            $table->string('code');
            $table->string('status');
            $table->string('year');

            $table->double('map_latitude');
            $table->double('map_longitude');

            $table->string('city');
            $table->string('province');
            $table->string('country');

            $table->string('slug');
            $table->integer('view');

            $table->string('view_north');
            $table->string('view_east');
            $table->string('view_west');
            $table->string('view_south');

            $table->tinyinteger('is_price_request');
            $table->tinyinteger('is_exclusive');

            $table->string('owner_name');
            $table->string('owner_email');
            $table->string('owner_phone');

            $table->string('detail_commission');
            $table->string('detail_contact');
            $table->string('detail_date');
            $table->string('detail_visited');
            $table->string('detail_sell_reason');
            $table->string('detail_note');
            $table->string('detail_other_agent');

            $table->tinyinteger('display');
            $table->string('orientation');
            $table->string('sell_in_furnish');

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
