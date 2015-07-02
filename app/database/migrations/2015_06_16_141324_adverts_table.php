<?php

use Illuminate\Database\Migrations\Migration;

class AdvertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('adverts', function($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('gml', 300);
            $table->integer('city')->unsigned();
            $table->integer('category')->unsigned();
            $table->string('address', 300);
            $table->string('image', 300);
            $table->integer('advertiser')->unsigned();
            $table->integer('priority')->unsigned();
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
        Schema::drop('adverts');
    }

}