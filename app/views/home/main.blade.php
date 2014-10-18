@extends('layout.default')
@section('content')
	<div class="row col-md-4">
		@include('post.form')
	</div>
	<div class="row col-md-1"></div>
	<div class="row col-md-6" id="posts">
		
		<div class="center-text">
		<!-- pagination -->
		</div>
	</div>
@stop
