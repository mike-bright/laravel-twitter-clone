<?php
class UserTableSeeder extends seeder {
	
	public function run() 
	{
		DB::table('user')->delete();

		for ($i=0; $i < 10; $i++) { 
			$faker = Faker\Factory::create();
			$seededUser = User::create(array(
				'email' => $faker->email,
				'firstName' => $faker->firstName,
				'lastName' => $faker->lastName,
				'userName' => $faker->userName
				));
			$seededUser->setPassword('password');
		}
	}
}