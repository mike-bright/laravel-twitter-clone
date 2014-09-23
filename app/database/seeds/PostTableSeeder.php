<?php
class PostTableSeeder extends seeder {
	
	public function run() 
	{
		DB::table('post')->delete();
		$i = 0;
		
    	foreach (User::all() as $user) {
            $faker = Faker\Factory::create();
    		Post::create(array(
    			'userId' => $user->id,
    			'text' => $faker->realText(150, 2),
    			'imageId' => Image::getBlankImage()->id
    			));

    		$i++;
    	}

	}
}