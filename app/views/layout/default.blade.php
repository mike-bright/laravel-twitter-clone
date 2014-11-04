<!doctype html>
<html>
<head>
	@include('includes.head')
    {{HTML::script('/components/jquery/dist/jquery.min.js')}}
</head>
<body>
	@if (User::getCurrent())
		<nav class="navbar navbar-default navbar-view" role="navigation"></nav>
	@else
		@include('includes.navplain')
	@endif
	<div id="main" class="container container-view">
		@yield('content')
	</div>
    {{HTML::script('/components/bootstrap/dist/js/bootstrap.min.js')}}
	@if (User::getCurrent())
		<script data-main="js/main" src="js/lib/requirejs/require.js"></script>
	@endif
</body>
</html>