@extends('layout.default')
@section('content')
	<div class="row col-md-4"></div>
	<div class="row col-md-4">
		<div class="form-group">
			{{Form::open(array('action' => 'UserController@showLogin'))}}
				{{Form::email('email', null, array('placeholder' => 'email', 'class' => 'form-control'))}}
				{{Form::password('password', array('placeholder' => 'password', 'class' => 'form-control'))}}
				<br>
				{{Form::submit('Login', array('class' => 'btn btn-default'))}}
				<a href="{{action('UserController@showSignup')}}" class="btn btn-success pull-right">Sign Up</a>
			{{Form::close()}}
		</div>
	</div>
@stop