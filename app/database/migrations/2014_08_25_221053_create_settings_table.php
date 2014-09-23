<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('settings', function($table)
	    {		
	    	$table->integer('userId')->unsigned();
	        $table->integer('profileImageId')->unsigned();
	        $table->integer('headerImageId')->unsigned();
	        $table->string('bio');
	        $table->string('location');
	        $table->string('url');
	        $table->string('color');
	        $table->integer('timezone');
	    });

	    Schema::table('settings', function($table)
	    {
	        $table->foreign('userId')->references('id')->on('user');
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
		//
	}

}
