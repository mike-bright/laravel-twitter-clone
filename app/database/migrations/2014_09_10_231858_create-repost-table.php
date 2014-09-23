<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('repost', function($table)
        {
            $table->increments('id');
            $table->integer('sourcePostId')->unsigned();
            $table->integer('postId')->unsigned();
            $table->tinyInteger('seen')->default(0);
            $table->dateTime('created');
            $table->timestamp('updated_at');
        });

        Schema::table('repost', function($table)
        {
            $table->foreign('sourcePostId')->references('id')->on('post');
            $table->foreign('postId')->references('id')->on('post');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('repost');
    }

}
