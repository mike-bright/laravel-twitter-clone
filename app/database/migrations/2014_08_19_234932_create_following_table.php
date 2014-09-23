<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('following', function($table)
	    {
	        $table->increments('id');
	        $table->integer('userId')->unsigned();
	        $table->integer('followingUserId')->unsigned();
	        $table->dateTime('created');
	    });

	    Schema::table('following', function($table)
	    {
	        $table->foreign('userId')->references('id')->on('user');
	        $table->foreign('followingUserId')->references('id')->on('user');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('following');
	}

}
