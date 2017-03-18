@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<h1 class="text-center">Products</h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Id</td>
					<td>Name</td>
					<td>Description</td>
					<td>Pricing</td>
					<td>Size</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
					<tr>
						<td>{{$product->id}}</td>
						<td>{{$product->name}}</td>
						<td>{{$product->description}}</td>
						<td>{{$product->pricing}}</td>
						<td>{{$product->size}}</td>
						<td></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<a href="{{url('/products/create')}}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create Product</a>
	</div>
</div>
@endsection