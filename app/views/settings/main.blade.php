@extends('layout.default')
{{HTML::style('components/jquery-minicolors/jquery.minicolors.css')}}
@section('content')
<div class="row col-md-3"></div>
<div class="row col-md-6">
	<h2>Settings</h2>
	<br>
	{{Form::model($settings, array('action' => 'SettingsController@showUserSettings'))}}
		<label for="firstName">First:</label>
		{{Form::text('firstName', $user->firstName, array( 'placeholder' => 'first',
															'class' => 'form-control',
															'id' => 'firstName'))}}
		<br>
		<label for="lastName">Last:</label>
		{{Form::text('lastName', $user->lastName, array( 'placeholder' => 'first',
															'class' => 'form-control',
															'id' => 'lastName'))}}
		<br>
		<label for="email">Email:</label>
		{{Form::email('email', $user->email, array( 'placeholder' => 'email',
													'class' => 'form-control', 
													'id' => 'email'
													))}}
		<br>
		<label for="password">Reset Password:</label>
		{{Form::password('password', array( 'placeholder' => 'password', 
											'id' => 'password',
											'class' => 'form-control'))}}
		{{Form::password('password2', array( 'placeholder' => 'confirm password', 
											'class' => 'form-control'))}}
		<br>
		<label for="location">Location:</label>
		{{Form::text('location', $settings->location, array( 'placeholder' => 'location',
															'class' => 'form-control',
															'id' => 'location'))}}
		<br>
		<label for="url">Homepage:</label>
		{{Form::text('url', $settings->url, array( 'placeholder' => 'url',
													'class' => 'form-control',
													'id' => 'url'))}}
		<br>
		<label for="bio">Bio:</label>
		{{Form::textarea('bio', $settings->bio, array( 'placeholder' => 'bio',
															'class' => 'form-control',
															'id' => 'bio'))}}
		<br>
		<label for="color">Color:</label>
		<br>
		{{Form::text('color', $settings->color, array( 'class' => 'form-control minicolors-input',
		                                               'id' => 'color'))}}
        <br>
		{{Form::submit('Save', array('class' => 'btn btn-default'))}}
		<a href="{{action('HomeController@showMain')}}" class="btn btn-success pull-right">Cancel</a>
	{{Form::close()}}
</div>
{{HTML::script('/components/jquery-minicolors/jquery.minicolors.min.js')}}
{{HTML::script('/js/settings/main.js')}}
@stop