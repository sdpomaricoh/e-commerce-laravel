@extends('layouts.app')

@section('content')
<div class="reg-form">
	<div class="container">
		<div class="reg">
        	<h3>Register</h3>
			<p>Welcome, please enter the following details to continue.</p>
			<p>If you have previously registered with us, <a href="#">click here</a></p>
        	<form role="form" method="POST" action="{{ route('register') }}">
	            {{ csrf_field() }}
	            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                <label for="name">Name</label>
	                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
	                @if ($errors->has('name'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('name') }}</strong>
	                    </span>
	                @endif
	            </div>
	            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                <label for="email">E-Mail Address</label>
	                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
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
	                <label for="password-confirm">Confirm Password</label>
	                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
	            </div>
	            <div class="form-group">
	                <input type="submit" value="Register">
	            </div>
				<p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p>
        	</form>
    	</div>
    </div>
</div>
@endsection
