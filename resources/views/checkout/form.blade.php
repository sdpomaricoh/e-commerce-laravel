{!! Form::open(['url' => '/checkout' ,'method'=>'POST']) !!}
	<input type="hidden" name="product_id" value="{{$product->id}}">
	<input type="submit" name="add" value="Add to Cart" class="btn item_add">
{!! Form::close() !!}