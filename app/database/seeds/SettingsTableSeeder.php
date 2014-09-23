<?php
class SettingsTableSeeder extends seeder {
	
	public function run() 
	{
		DB::table('settings')->delete();

		foreach (User::all() as $user) {
			$faker = Faker\Factory::create();
			Settings::create(array(
				'userId' => $user->id,
				'profileImageId' => Image::getBlankImage()->id,
				'headerImageId' => Image::getBlankImage()->id,
				'bio' => $faker->realText(150, 2),
				'location' => 'Grand Rapids, MI',
				'url' => $faker->url
				));
		}
	}
}