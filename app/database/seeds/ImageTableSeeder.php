<?php

class ImageTableSeeder extends seeder {
	
	public function run() 
	{
		DB::table('image')->delete();
		Image::create(array(
			'url' => ''
			));
	}
}