@extends('layouts.app')

@section('carousel')
<div class="header-end">
	<div class="container">
		<div id="mainCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#mainCarousel" data-slide-to="1"></li>
				<li data-target="#mainCarousel" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
			  <div class="item active">
				  <img src="img/shoe3.jpg" alt="...">
				  <div class="carousel-caption car-re-posn">
					  <h3>AirMax</h3>
					  <h4>You feel to fall</h4>
					  <span class="color-bar"></span>
				  </div>
			  </div>
			  <div class="item">
				<img src="img/shoe1.jpg" alt="...">
				  <div class="carousel-caption car-re-posn">
					  <h3>AirMax</h3>
					  <h4>You feel to fall</h4>
					  <span class="color-bar"></span>
				  </div>
			  </div>
			  <div class="item">
				<img src="img/shoe2.jpg" alt="...">
				  <div class="carousel-caption car-re-posn">
					  <h3>AirMax</h3>
					  <h4>You feel to fall</h4>
					  <span class="color-bar"></span>
				  </div>
			  </div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#mainCarousel" role="button" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left car-icn" aria-hidden="true"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#mainCarousel" role="button" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right car-icn" aria-hidden="true"></span>
			  <span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
@endsection
@section('content')
<div class="feel-fall">
	<div class="container">
		<div class="pull-left fal-box">
			<div class=" fall-left">
				<h3>Fall</h3>
				<img src="img/f-l.png" alt="/" class="img-responsive fl-img-wid">
				<p>Inspiration and innovation<br> for every athlete in the world</p>
				<span class="fel-fal-bar"></span>
			</div>
		</div>
		<div class="pull-right fel-box">
			<div class="feel-right">
				<h3>Feel</h3>
				<img src="img/f-r.png" alt="/" class="img-responsive fl-img-wid">
				<p>Inspiration and innovation<br> for every athlete in the world</p>
				<span class="fel-fal-bar2"></span>
			</div>
		</div>
	<div class="clearfix"></div>
	</div>
</div>

<div class="shop-grid">
	<div class="container">
		@foreach ($frontpage as $product)
			<div class="col-md-4 grid-stn simpleCart_shelfItem">
				<div class="ih-item square effect3 bottom_to_top">
					<div class="bottom-2-top">
						<div class="img"><img src="img/grid11.jpg" alt="/" class="img-responsive gri-wid"></div>
						<div class="info">
							<div class="pull-left styl-hdn">
								<h3>{{$product->name}}</h3>
							</div>
							<div class="pull-right styl-price">
								<p><a  href="#" class="item_add"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span> <span class=" item_price">$ {{$product->pricing}}</span></a></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="quick-view">
						<a href="{{url('/product/'.$product->slug)}}">Quick view</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection