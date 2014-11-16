<?php

class SettingsController extends BaseController {

    public function index()
    {
        $user = User::getCurrent();
        $settings = $user->settings;

        return $user->settings->toArray();
    }

	public function update()
	{
		$user = User::getCurrent();
        $settings = $user->settings;

        $user->firstName = Input::get('firstName');
        $user->lastName = Input::get('lastName');
        $user->email = Input::get('email');
        $user->save();
        $settings->location = Input::get('location');
        $settings->url = Input::get('url');
        $settings->bio = Input::get('bio');
        $settings->color = Input::get('color');
        $settings->save();

        return $user->settings->toArray();
	}
}