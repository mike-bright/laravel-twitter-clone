<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestamps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user', function($table)
		{
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->dropColumn('created');
		});
		Schema::table('post', function($table)
		{
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->dropColumn('created');
			$table->dropColumn('updated');
		});
		Schema::table('image', function($table)
		{
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->dropColumn('created');
		});
		Schema::table('following', function($table)
		{
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->dropColumn('created');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user', function($table)
		{
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
			$table->timestamp('created');
		});
		Schema::table('post', function($table)
		{
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
			$table->timestamp('created');
			$table->timestamp('updated');
		});
		Schema::table('image', function($table)
		{
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
			$table->timestamp('created');
		});
		Schema::table('following', function($table)
		{
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
			$table->timestamp('created');
		});
	}

}
