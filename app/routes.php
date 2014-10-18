<?php

/**********/
// Routes //
/**********/

//HomeController
Route::get('/', array('before' => 'auth', 'uses' => 'HomeController@showMain'));
Route::get('/page/{pageNumber}', array('before' => 'auth', 'uses' => 'HomeController@showMain'));

//UserController
Route::get('/logout', 'UserController@logout');
Route::match(array('GET', 'POST'), '/login', 'UserController@showLogin');
Route::match(array('GET', 'POST'), '/signup', 'UserController@showSignup');
Route::get('/user/{userName}', array('before' => 'auth', 'uses' => 'UserController@showProfile'));
Route::get('/api/user/follow/{user}', array('before' => 'auth', 'uses' => 'UserController@followUser'));
Route::get('/api/user/unfollow/{user}', array('before' => 'auth', 'uses' => 'UserController@unfollowUser'));

//PostController
Route::resource('/api/post', 'PostController', array('before' => 'auth'));
Route::post('/api/search/{query}', array('before' => 'auth', 'uses' => 'PostController@search'));

//SettingsController
Route::match(array('GET', 'POST'), '/settings', array('before' => 'auth', 'uses' => 'SettingsController@showUserSettings'));

//RepostController
Route::get('/repost/create/{sourcePostId}', array('before' => 'auth', 'uses' => 'RepostController@create'));
Route::get('/repost/destroy/{repostId}', array('before' => 'auth', 'uses' => 'RepostController@destroy'));