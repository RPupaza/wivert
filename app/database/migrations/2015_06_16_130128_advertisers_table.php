<?php

use Illuminate\Database\Migrations\Migration;

class AdvertisersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('advertisers', function($table) {
            $table->increments('id');
            $table->string('fullname', 100);
            $table->string('email', 300);
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
        Schema::drop('advertisers');
    }

}