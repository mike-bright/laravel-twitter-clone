@extends('layout.default')
@section('content')
	<div class="row col-md-4">
		@include('home.usercard')
		@include('post.form')
	</div>
	<div class="row col-md-1"></div>
	<div class="row col-md-6 post-list">
		@include('post.list')
		<div class="center-text">
			{{$posts->links()}}
		</div>
	</div>
	{{HTML::script('/js/home/main.js')}}
@stop
