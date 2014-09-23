<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('user', function($table)
	    {
	        $table->increments('id');
	        $table->string('email')->unique();
	        $table->string('password');
	        $table->string('firstName');
	        $table->string('lastName');
	        $table->string('userName');
	        $table->integer('profileImageId')->unsigned();
	        $table->integer('headerImageId')->unsigned();
	        $table->string('bio');
	        $table->string('location');
	        $table->string('url');
	        $table->string('color');
	        $table->integer('timezone');
	        $table->dateTime('created');
	    });

	    Schema::table('user', function($table)
	    {
	        $table->foreign('profileImageId')->references('id')->on('image');
	        $table->foreign('headerImageId')->references('id')->on('image');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
