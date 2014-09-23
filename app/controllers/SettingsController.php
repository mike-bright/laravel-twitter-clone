<?php

class SettingsController extends BaseController {
	public function showUserSettings()
	{
		$user = User::getCurrent();
        $settings = $user->settings;

        if (Input::has('firstName')) {
            $user->firstName = Input::get('firstName');
            $user->lastName = Input::get('lastName');
            $user->email = Input::get('email');
            $user->save();
            $settings->location = Input::get('location');
            $settings->url = Input::get('url');
            $settings->bio = Input::get('bio');
            $settings->color = Input::get('color');
            $settings->save();
		}

		$viewData = array(
			'settings' => $settings,
			'user' => $user
			);

		return View::make('settings.main', $viewData);
	}
}