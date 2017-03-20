<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Dashboad N-Air</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Dashboard') }}</title>

		<!-- Styles -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css">

		<!-- Material Design fonts -->
  		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

		<style media="screen">
			body { padding-top: 70px; }
		</style>

		<!-- Scripts -->
	    <script>
	        window.Laravel = {!! json_encode([
	            'csrfToken' => csrf_token(),
	        ]) !!};
	    </script>
	</head>
	<body>
		<div id="app">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
      					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#dashboard-menu" aria-expanded="false">
        					<span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
      					</button>
						<a class="navbar-brand" href="{{url('/')}}">{{config('app.name','N-Air')}}</a>
					</div>
					<div class="collapse navbar-collapse" id="dashboard-menu">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">{{Auth::user()->name}} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{url('/logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Logout</a>
										<form  id="logout-form" action="{{url('/logout')}}" method="post" style="display:none;">
											{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			@yield('content')
		</div>
		<!-- Scripts -->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js" ></script>
		<script type="text/javascript">
			$.material.init();
		</script>
	</body>
</html>