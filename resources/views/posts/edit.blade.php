@extends('layouts.app')
@section('content')
	{!! Form::model($post, ['action' => ['PostController@update', $post->id], 'method' => 'PUT']) !!}
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
		<hr>
		<script>
			let address = {
				street: '{{ $post->location->street }}',
				number: '{{ $post->location->address_number }}',
				city: '{{ $post->location->city }}',
				zipcode: '{{ $post->location->zipcode }}',
			};
		</script>
		<div id="root"></div>
	{!! Form::close() !!}
@endsection
