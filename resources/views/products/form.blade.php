{!! Form::open(['url' => $url ,'method'=>$method]) !!}
	{{ csrf_field() }}
	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name',$product->name,['class'=>'form-control','placeholder'=>"Name"])}}
	</div>
	<div class="form-group">
		{{ Form::label('pricing', 'Pricing') }}
		{{ Form::number('pricing',$product->pricing,['class'=>'form-control','placeholder'=>"Princing of product"]) }}
	</div>
	<div class="form-group">
		{{ Form::label('size', 'Size') }}
		{{ Form::text('size',$product->size,['class'=>'form-control','placeholder'=>"Size"])}}
	</div>
	<div class="form-group">
		{{ Form::label('category_id', 'Category') }}
		<select class="" name="category_id">
			@foreach ($categories as $category)
				@if($category->id === $product->category_id)
					<option value="{{$category->id}}" selected>{{$category->name}}</option>
				@else
					<option value="{{$category->id}}">{{$category->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
	<div class="form-group">
		{{ Form::label('description', 'Description') }}
		{{ Form::textarea('description',$product->description,['class'=>'form-control','placeholder'=>"Description of product"])}}
	</div>
	<div class="form-group">
		{{ Form::submit($action.' Product',['class'=>'btn btn-primary btn-raised'])}}
	</div>
	<p class="click">If don't wanna create a product, please click on <a href="{{url('/products')}}"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back to the Products</a></p>
{!! Form::close() !!}