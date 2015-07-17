<?php

use Illuminate\Database\Migrations\Migration;

class CommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function($table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('text', 500);
            $table->integer('rate')->unsigned();
            $table->integer('deal')->unsigned();
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
        Schema::drop('comments');
    }

}