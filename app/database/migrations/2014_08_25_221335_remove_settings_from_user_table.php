<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSettingsFromUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user', function($table)
		{
	        $table->dropColumn('profileImageId');
	        $table->dropColumn('headerImageId');
	        $table->dropColumn('bio');
	        $table->dropColumn('location');
	        $table->dropColumn('url');
	        $table->dropColumn('color');
	        $table->dropColumn('timezone');
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
