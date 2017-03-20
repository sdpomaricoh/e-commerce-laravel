@extends('layouts.dashboard')
@section('content')
	<div class="container text-center">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12">
				<div class="card">
					<h2>{{$product->name}}</h2>
					<div class="col-md-6 col-sm-12"></div>
					<div class="col-md-6 col-sm-12 text-left">
						<h4>Description</h4>
						<p>{{$product->description}}</p>
						<h4>Size</h4>
						<p>{{$product->size}}</p>
						<h4>Price</h4>
						<p>$ {{$product->pricing}} USD</p>
						<a href="{{url('/products/'.$product->id.'/edit')}}" class="btn btn-info">Edit</a>
						@include('products.delete',['products'=>$product])
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection