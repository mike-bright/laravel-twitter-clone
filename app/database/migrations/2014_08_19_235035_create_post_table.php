<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('post', function($table)
	    {
	        $table->increments('id');
	        $table->integer('userId')->unsigned();
	        $table->string('text');
	        $table->integer('imageId')->unsigned();
	        $table->string('location');
	        $table->dateTime('created');
	        $table->dateTime('updated');
	    });

	    Schema::table('post', function($table)
	    {
	        $table->foreign('userId')->references('id')->on('user');
	        $table->foreign('imageId')->references('id')->on('image');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post');
	}

}
