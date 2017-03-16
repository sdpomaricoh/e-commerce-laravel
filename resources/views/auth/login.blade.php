@extends('layouts.app')

@section('content')
<div class="login">
	<div class="container">
		<div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">HOME</a></li>
                    <li class="active">LOGIN</li>
                </ol>
            </div>
        </div>
		<div class="login-grids">
			<div class="col-md-6 log">
				<h3>Login</h3>
				<div class="strip"></div>
				<p>Welcome, please enter the following to continue.</p>
				<form role="form" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email">Email Address</label>
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password">Password</label>
						<input id="password" type="password" class="form-control" name="password" required>
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
							</label>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" value="login">
						<a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
					</div>
				</form>
			</div>
			<div class="col-md-6 login-right">
				<h3>New Registration</h3>
				<div class="strip"></div>
				<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				<a href="{{ url('/register') }}" class="button">Create An Account</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection
