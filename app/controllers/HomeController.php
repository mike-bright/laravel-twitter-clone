<?php

class HomeController extends BaseController {

	public function showMain()
	{
		return View::make('home.main');
	}

}
