@extends('layouts.app')
@section('content')
<div class="check">
	<div class="container">
		<div class="col-md-3 cart-total">
			<div class="price-details">
				<h3>Price Details</h3>
				<span>Total</span>
				<span class="total1">6200.00</span>
				<span>Discount</span>
				<span class="total1">10%(Festival Offer)</span>
				<span>Delivery Charges</span>
				<span class="total1">150.00</span>
				<div class="clearfix"></div>
			</div>
			<hr class="featurette-divider">
			<ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>
			   <li class="last_price"><span>6150.00</span></li>
			   <div class="clearfix"> </div>
			</ul>
			<div class="clearfix"></div>
			<a class="order" href="#">Place Order</a>
		</div>
		<div class="col-md-9 cart-items">
			<h1>My Shopping Bag (2)</h1>
			<div class="cart-header">
				<div class="close"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
				<div class="cart-sec">
					<div class="cart-item cyc">
						<img src="img/grid11.jpg" class="img-responsive" alt=""/>
					</div>
				   <div class="cart-item-info">
						<ul class="qty">
							<li><p>Size : 9 US</p></li>
							<li><p>Qty : 1</p></li>
							<li><p>Price each : $190</p></li>
						</ul>
						<div class="delivery">
							 <p>Service Charges : Rs.190.00</p>
							 <span>Delivered in 2-3 bussiness days</span>
							 <div class="clearfix"></div>
						</div>
				   </div>
				   <div class="clearfix"></div>
				</div>
			</div>
			<div class="cart-header">
				<div class="close"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
				<div class="cart-sec">
					<div class="cart-item cyc">
						<img src="img/grid11.jpg" class="img-responsive" alt=""/>
					</div>
				   <div class="cart-item-info">
						<ul class="qty">
							<li><p>Size : 9 US</p></li>
							<li><p>Qty : 1</p></li>
							<li><p>Price each : $190</p></li>
						</ul>
						<div class="delivery">
							 <p>Service Charges : Rs.190.00</p>
							 <span>Delivered in 2-3 bussiness days</span>
							 <div class="clearfix"></div>
						</div>
				   </div>
				   <div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection