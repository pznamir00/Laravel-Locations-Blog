@extends('layouts.app')
@section('content')
	{!! Form::model($post, ['action' => ['PostController@update', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
		<div class="form-group">
			@csrf
			{{Form::label('Title')}}
			{{Form::text('title', $post->title, ['class'=>'form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('Description')}}
			{{Form::textarea('description', $post->description, ['class'=>'ckeditor form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('Category')}}
			{{Form::select('category_id', $categories, $post->category_id, ['class'=>'form-control'])}}
		</div>
		<div> <!-- instances for location -->
			{{Form::hidden('street_instance', $post->location->street)}}
			{{Form::hidden('address_number_instance', $post->location->address_number)}}
			{{Form::hidden('city_instance', $post->location->city)}}
			{{Form::hidden('zipcode_instance', $post->location->zipcode)}}
			{{Form::hidden('imageUrlInstance', '/media/'.$post->image->name)}}
			{{Form::hidden('imgWasChanged', 'false')}}
		</div>
		<hr>
		<div id="root"></div>
	{!! Form::close() !!}
@endsection
