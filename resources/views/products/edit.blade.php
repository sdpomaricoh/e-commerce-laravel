@extends('layouts.dashboard')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="well">
				<h3 class="text-center">Edit Products</h3>
				@include('products.form',['product'=>$product,'url'=>'/products/'.$product->id,'method'=>'PATCH','action'=>'Edit'])
			</div>
		</div>
	</div>
</div>
@endsection