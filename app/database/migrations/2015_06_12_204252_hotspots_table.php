<?php

use Illuminate\Database\Migrations\Migration;

class HotspotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('hotspots', function($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->bigInteger('time')->unsigned();
            $table->integer('status')->unsigned();
            $table->integer('category')->unsigned();
            $table->integer('city')->unsigned();
            $table->integer('auth')->unsigned();
            $table->string('img', 250);
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
        Schema::drop('hotspots');
	}

}