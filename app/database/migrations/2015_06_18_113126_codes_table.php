<?php

use Illuminate\Database\Migrations\Migration;

class CodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('codes', function($table) {
            $table->increments('id');
            $table->string('code', 100);
            $table->integer('deal')->unsigned();
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
        Schema::drop('codes');
    }


}