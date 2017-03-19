@extends('layouts.dashboard')
@section('content')
<div class="container">
	<div class="row">
		<div class="well">
			<h1 class="text-center">Products</h1>
			<table class="table table-striped table-hover">
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
							<td>
								<a href="{{'products/'.$product->id.'/edit'}}" class="btn btn-info">Edit</a>
								@include('products.delete',['products'=>$product])
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<a href="{{url('/products/create')}}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create Product</a>
	</div>
</div>
@endsection