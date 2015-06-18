<?php

use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table) {
            $table->increments('id');
            $table->string('email', 100);
            $table->string('password', 64);
            $table->string('hotspot', 100);
            $table->integer('active')->unsigned();
            $table->timestamps();
            $table->string('remember_token', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}