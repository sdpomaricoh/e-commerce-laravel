{!! Form::open(['url' => '/checkout' ,'method'=>'POST']) !!}
	<input type="hidden" name="product_id" value="{{$product->id}}">
	<input type="submit" name="add" value="Add to cart" class="btn btn-success">
{!! Form::close() !!}