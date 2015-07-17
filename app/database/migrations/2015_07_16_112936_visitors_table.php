<?php

use Illuminate\Database\Migrations\Migration;

class VisitorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('visits', function($table) {
            $table->increments('id');
            $table->integer('visits')->unsigned();
            $table->integer('advert')->unsigned();
            $table->integer('hotspot')->unsigned();
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
        Schema::drop('visits');
    }

}