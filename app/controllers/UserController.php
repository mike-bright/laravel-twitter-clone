<?php

class UserController extends BaseController {

	public function showLogin()
	{
		if(!Auth::check()){
			if(Input::has('email') && Input::has('password')){
				$user = new User();
				$user->login(Input::get('email'), Input::get('password'));
				return Redirect::to('/');
			}
			return View::make('user.login');
		}
		return Redirect::to('/');
	}

	public function logout()
	{
		if(Auth::check()){
			User::getCurrent()->logout();
		}
		return Redirect::to('/');
	}

	public function getUser($userName)
	{
		try {
			$user = User::where('userName', '=', $userName)->firstOrFail();
		} catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
			return Redirect::to('/');
		}
		$currentUser = User::getCurrent();
		$following = following::
			  where('userId', '=', $currentUser->id)
			->where('followingUserId', '=', $user->id)
			->get();
		$isFollowing = count($following) > 0;
		$isCurrent = $user->id === $currentUser->id;
		$settings = $user->settings;

		$user['isFollowing'] = $isFollowing;
		$user['isCurrent'] = $isCurrent;
		$user['settings'] = $settings;

		return Response::json($user);
	}

	public function followUser($user)
	{
		$currentUser = User::getCurrent(); 
		if(!$currentUser->isFollowing($user)) {
			Following::create(array(
				'userId' => $currentUser->id,
				'followingUserId' => $user->id
				));
		}
		return Redirect::back();
	}


	public function unfollowUser($user)
	{
		$currentUser = User::getCurrent(); 
		if($currentUser->isFollowing($user)) {
			Following::following($user->id)
					->follower($currentUser->id)
					->delete();
		}
		return Redirect::back();
	}

	public function showSignup()
	{
		if(!Auth::check()){
			if(Input::has('email') && Input::has('password')){
				$user = new User();
				$user->email = Input::get('email');
				$user->userName = Input::get('userName');
				$user->setPassword(Input::get('password'));
				return Redirect::to('/');
			}
			return View::make('user.login');
		}
		return Redirect::to('/');
	}

	public function index()
	{
		$user = User::getCurrent();
		$settings = $user->settings;

		$user['isFollowing'] = false;
		$user['isCurrent'] = true;
		$user['settings'] = $settings;

		return Response::json($user);
	}
}