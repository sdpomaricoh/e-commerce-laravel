@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-sm-12">
			<div class="purchase">
				<h2 class="text-center">Completed Purchase</h2>
				<div class="alert alert-success alert-dismissible text-center" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Your payment</strong>  was processed successfully,<br>
				  The status of your order: {{$order->status}}
				</div>
				<h3>Shipping Details</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<td>#</td>
							<td>Field</td>
							<td>Value</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Email</td>
							<td>{{$order->email}}</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Address</td>
							<td>{{$order->address()}}</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Postal Code</td>
							<td>{{$order->postal_code}}</td>
						</tr>
						<tr>
							<td>4</td>
							<td>City</td>
							<td>{{$order->city}}</td>
						</tr>
						<tr>
							<td>5</td>
							<td>State/Country</td>
							<td>{{$order->state}}/{{$order->country_code}}</td>
						</tr>
					</tbody>
				</table>
				<hr>
				<a href="{{ url('/purchases/'.$shoppingCart->custom_id) }}" class="perma-link"><i class="fa fa-link" aria-hidden="true"></i> Permanent link to your purchase</a>
			</div>
		</div>
	</div>
</div>
@endsection