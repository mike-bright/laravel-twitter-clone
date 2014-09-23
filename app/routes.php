<?php

// Models
Route::model('user', 'User');
Route::model('post', 'Post');

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
Route::get('/user/follow/{user}', array('before' => 'auth', 'uses' => 'UserController@followUser'));
Route::get('/user/unfollow/{user}', array('before' => 'auth', 'uses' => 'UserController@unfollowUser'));

//PostController
Route::post('/post/new', array('before' => 'auth', 'uses' => 'PostController@create'));
Route::get('/post/delete/{post}', array('before' => 'auth.post', 'uses' => 'PostController@destroy'));
Route::post('/search/{query}', array('before' => 'auth', 'uses' => 'PostController@search'));
Route::get('/post/latest', array('before' => 'auth', 'uses' => 'PostController@latestUpdateTime'));
Route::get('/post/since/{postId}', array('before' => 'auth', 'uses' => 'PostController@postsSince'));

//SettingsController
Route::match(array('GET', 'POST'), '/settings', array('before' => 'auth', 'uses' => 'SettingsController@showUserSettings'));

//RepostController
Route::get('/repost/create/{sourcePostId}', array('before' => 'auth', 'uses' => 'RepostController@create'));
Route::get('/repost/destroy/{repostId}', array('before' => 'auth', 'uses' => 'RepostController@destroy'));