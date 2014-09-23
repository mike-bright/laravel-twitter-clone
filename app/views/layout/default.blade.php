<!doctype html>
<html>
<head>
	@include('includes.head')
    {{HTML::script('/components/jquery/dist/jquery.min.js')}}
</head>
<body>
	@if (User::getCurrent())
		@include('includes.nav')
	@else
		@include('includes.navplain')
	@endif
	<div id="main" class="container">
		@yield('content')
	</div>
	{{HTML::script('/js/app.js')}}
    {{HTML::script('/components/bootstrap/dist/js/bootstrap.min.js')}}
</body>
</html>