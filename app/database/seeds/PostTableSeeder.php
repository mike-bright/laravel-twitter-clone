<?php
class PostTableSeeder extends seeder {
	
	public function run() 
	{
		DB::table('post')->delete();
		
    	foreach (User::all() as $user) {
            for ($i=0; $i < 10; $i++) { 
                $faker = Faker\Factory::create();
        		Post::create(array(
        			'userId' => $user->id,
        			'text' => $faker->realText(150, 2),
        			'imageId' => Image::getBlankImage()->id
    			));
            }
    	}

	}
}