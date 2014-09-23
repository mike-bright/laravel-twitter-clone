<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
	 	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		$this->call('ImageTableSeeder');
    	$this->command->info('The image table has been seeded!');
		$this->call('UserTableSeeder');
    	$this->command->info('The user table has been seeded!');
		$this->call('FollowingTableSeeder');
    	$this->command->info('The following table has been seeded!');
    	$this->call('PostTableSeeder');
    	$this->command->info('The post table has been seeded!');
    	$this->call('SettingsTableSeeder');
    	$this->command->info('The settings table has been seeded!');
	 	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
