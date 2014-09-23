<?php

class FollowingTableSeeder extends Seeder {
	public function run()
	{
		DB::table('following')->delete();

		foreach (User::all() as $user) {
			foreach (User::all() as $following) {
				Following::create(array(
					'userId' => $user->id,
					'followingUserId' => $following->id
					));
			}
		}
	}
}