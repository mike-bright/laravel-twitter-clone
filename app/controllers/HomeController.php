<?php

class HomeController extends BaseController {

	public function showMain()
	{
		$user = User::getCurrent();
		$posts = Post::fetchAllHomePosts($user)->simplePaginate(10);
		$followerCount = $user->getFollowersCount();
		$followingCount = $user->getFollowingCount();

		$viewData = array(
			'posts' => $posts,
			'followerCount' => $followerCount,
			'followingCount' => $followingCount,
			'user' => $user,
			);

		return View::make('home.main', $viewData);
	}

}
