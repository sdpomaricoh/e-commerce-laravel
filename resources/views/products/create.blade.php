@extends('layouts.app')
@section('content')
<div class="reg-form">
	<div class="container">
		<div class="row">
			<div class="reg">
				<div class="col-md-8 col-md-offset-2">
					<h3 class="text-center">Create Products</h3>
					{!! Form::open(['url' => 'products','method'=>'POST']) !!}
						{{ csrf_field() }}
						<div class="form-group">
							{{ Form::label('name', 'Name') }}
							{{ Form::text('name','',['class'=>'form-control','placeholder'=>"Name"])}}
						</div>
						<div class="form-group">
							{{ Form::label('pricing', 'Pricing') }}
							{{ Form::number('pricing','',['class'=>'form-control','placeholder'=>"Princing of product"]) }}
						</div>
						<div class="form-group">
							{{ Form::label('size', 'Size') }}
							{{ Form::text('size','',['class'=>'form-control','placeholder'=>"Size"])}}
						</div>
						<div class="form-group">
							{{ Form::label('category_id', 'Category') }}
							<select class="" name="category_id">
								<option value="" selected>None</option>
								@foreach ($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							{{ Form::label('description', 'Description') }}
							{{ Form::textarea('description','',['class'=>'form-control','placeholder'=>"Description of product"])}}
						</div>
						<div class="form-group">
							{{ Form::submit('Create Product')}}
						</div>
						<p class="click">If don't wanna create a product, please click on <a href="{{url('/products')}}"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back to the Products</a></p>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection