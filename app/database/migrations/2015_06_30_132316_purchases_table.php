<?php

use Illuminate\Database\Migrations\Migration;

class PurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
     */
    public function up()
    {
        Schema::create('purchases', function($table) {
            $table->increments('id');
            $table->string('email', 100);
            $table->string('code', 100);
            $table->string('transaction_id', 100);
            $table->float('price')->unsigned();
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
        Schema::drop('purchases');
    }

}