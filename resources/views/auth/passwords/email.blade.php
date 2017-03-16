@extends('layouts.app')

@section('content')
<div class="email-form">
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <h3>Reset Password</h3>
	            @if (session('status'))
	                <div class="alert alert-success">
	                    {{ session('status') }}
	                </div>
	            @endif
	            <form  role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Password Reset Link">
                    </div>
	            </form>
	        </div>
	    </div>
	</div>
</div>
@endsection
