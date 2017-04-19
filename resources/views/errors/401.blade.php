@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12">
                <div class="error-handling">
                    <h2>You can't access this page</h2>
                    <span class="error-icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <p><i class="fa fa-home" aria-hidden="true"></i> Return to <a href="{{ url('/') }}">home page</a> ?</p>
                </div>
            </div>
        </div>
    </div>
@endsection