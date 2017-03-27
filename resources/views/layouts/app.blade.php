<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.min.css">
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
		<div class="header">
			<div class="container">
				<div class="header-top">
				<div class="logo">
					<a href="{{url('/')}}">N-AIR</a>
				</div>
				<div class="login-bars">
					<a class="btn btn-default log-bar" href="{{ url('/register') }}" role="button">Sign up</a>
					<a class="btn btn-default log-bar" href="{{ route('login') }}" role="button">Login</a>
					<div class="cart box_1">
						<a href="{{url('/checkout')}}">
							<h3>
								<div class="total">
									<span class="simpleCart_total">$ {{$shoppingCart->total()}} USD</span>(<span id="simpleCart_quantity" class="simpleCart_quantity">{{$shoppingCart->productSizes()}}</span>)
								</div>
							</h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
				<div class="header-botom">
				<div class="content">
					<nav class="navbar navbar-default nav-menu" role="navigation">
						<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="clearfix"></div>
						<div class="collapse navbar-collapse collapse-pdng" aria-expanded="true" id="main-menu">
							<ul class="nav navbar-nav nav-font">
								<li><a href="#">Shop</a></li>
								<li><a href="#">Men</a></li>
								<li><a href="#">Woman</a></li>
								<li><a href="#">Kids</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
				@yield('carousel')
		</div>
		</div>

        @yield('content')
		<footer class="footer-grid">
			<div class="container">
				<div class="col-md-2 re-ft-grd">
					<h3>Categories</h3>
					<ul class="categories">
						<li><a href="#">Men</a></li>
						<li><a href="#">Women</a></li>
						<li><a href="#">Kids</a></li>
						<li><a href="#">Formal</a></li>
						<li><a href="#">Casuals</a></li>
						<li><a href="#">Sports</a></li>
					</ul>
				</div>
				<div class="col-md-2 re-ft-grd">
					<h3>Short links</h3>
					<ul class="shot-links">
						<li><a href="#">Contact us</a></li>
						<li><a href="#">Support</a></li>
						<li><a href="#">Delivery</a></li>
						<li><a href="#">Return Policy</a></li>
						<li><a href="#">Terms & conditions</a></li>
						<li><a href="#">Sitemap</a></li>
					</ul>
				</div>
				<div class="col-md-6 re-ft-grd">
					<h3>Social</h3>
					<ul class="social">
						<li><a href="#" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="twt"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="gpls"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="col-md-2 re-ft-grd">
					<div class="bt-logo">
						<div class="logo">
							<a href="{{url('/')}}" class="ft-log">N-AIR</a>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="copy-rt">
				<div class="container">
					<p>&copy;   2017 N-AIR All Rights Reserved.</p>
				</div>
			</div>
		</footer>
    </div>

    <!-- Scripts -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/jquery.flexslider.min.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>
</html>
