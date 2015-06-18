<?php

use Illuminate\Database\Migrations\Migration;

class DealsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('deals', function($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('description', 300);
            $table->float('price')->unsigned();
            $table->integer('available')->unsigned();
            $table->string('image', 300);
            $table->integer('advert')->unsigned();
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
        Schema::drop('deals');
    }

}