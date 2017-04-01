@extends('layouts.dashboard')
@section('content')
<div class="container">
	<div class="row">
		<div class="well">
			<h1>Orders</h1>
			<div class="col-xs-4 col-md-3 col-lg-2 data-info">
				<p><span>{{$totalMonth}} USD</span> Month income</p>
			</div>
			<div class="col-xs-4 col-md-3 col-lg-2 data-info">
				<p><span>{{$totalMonthCount}}</span><br> Total sales this month</p>
			</div>
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<td>Id</td>
						<td>Buyer</td>
						<td>Address</td>
						<td>Guide number</td>
						<td>Status</td>
						<td>Date of sell</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($orders as $order)
						<tr>
							<td>{{$order->id}}</td>
							<td>{{$order->recipient_name}}</td>
							<td>{{$order->address()}}</td>
							<td>{{$order->guide_number}}</td>
							<td>{{$order->status}}</td>
							<td>{{$order->created_at}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection