{!! Form::open(['url' => '/products/'.$products->id ,'method'=>'DELETE']) !!}
	<input type="submit" value="Delete" class="btn btn-danger">
{!! Form::close() !!}