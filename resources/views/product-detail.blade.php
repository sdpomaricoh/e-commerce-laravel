@extends('layouts.app')

@section('content')
<div class="showcase-grid">
	<div class="container">
		<div class="col-md-8 showcase">
			<div class="flexslider">
				<ul class="slides">
					<li data-thumb="../img/show.jpg">
						<div class="thumb-image"> <img src="../img/show.jpg" class="img-responsive"> </div>
					</li>
					<li data-thumb="../img/show1.jpg">
						 <div class="thumb-image"> <img src="../img/show1.jpg" class="img-responsive"> </div>
					</li>
					<li data-thumb="../img/show2.jpg">
					   <div class="thumb-image"> <img src="../img/show2.jpg" class="img-responsive"> </div>
					</li>
					<li data-thumb="../img/show3.jpg">
					   <div class="thumb-image"> <img src="../img/show3.jpg" class="img-responsive"> </div>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-4 showcase">
			<div class="showcase-rt-top">
				<div class="pull-left shoe-name">
					<h3>{{$product->name}}</h3>
					<p>{{$product->category->name}}</p>
					<h4>&#36;{{$product->pricing}} USD</h4>
				</div>
				<div class="pull-left rating-stars">
					<ul>
						<li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
						<li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
						<li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
						<li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
						<li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
					</ul>
					<ol class="flex-control-nav flex-control-thumbs">

					</ol>
				</div>
				<div class="clearfix"></div>
			</div>
			<hr class="featurette-divider">
			<div class="shocase-rt-bot">
				<div class="float-qty-chart">
					<ul>
						<li class="qty">
							<h3>Size Chart</h3>
							<select class="form-control siz-chrt">
							  <option>6 US</option>
							  <option>7 US</option>
							  <option>8 US</option>
							  <option>9 US</option>
							  <option>10 US</option>
							  <option>11 US</option>
							</select>
						</li>
						<li class="qty">
							<h3>QTY</h3>
							<select class="form-control qnty-chrt">
							  <option>1</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
							  <option>6</option>
							  <option>7</option>
							</select>
						</li>
					</ul>
					<div class="clearfix"></div>
					<ul>
						<li class="ad-2-crt simpleCart_shelfItem">
							<a class="btn item_add" href="#" role="button">Add To Cart</a>
							<a class="btn" href="#" role="button">Buy Now</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="showcase-last">
				<h3>product details</h3>
				<p>{{$product->description}}</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>
@endsection