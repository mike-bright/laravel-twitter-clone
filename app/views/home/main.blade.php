@extends('layout.default')
@section('content')
	<div class="row col-md-4">
		<div id="user"></div>
		@include('post.form')
	</div>
	<div class="row col-md-1"></div>
	<div class="row col-md-6">
		<div id="posts">
			
		</div>
		<a id="loadMore">
			<div class="center-text well well-sm">
				Load more...
			</div>
		</a>
	</div>
@stop
