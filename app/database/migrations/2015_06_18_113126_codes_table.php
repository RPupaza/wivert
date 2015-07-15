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
            $table->string('code_template', 200);
            $table->string('code_pdf', 200);
            $table->integer('deal')->unsigned();
            $table->integer('available')->unsigned();
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