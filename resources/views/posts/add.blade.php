@extends('layouts.app')
@section('content')
	{!! Form::open(['action' => 'PostController@commit', 'method' => 'POST']) !!}
		<div class="form-group">
			@csrf
			{{Form::label('Title')}}
			{{Form::text('title', '', ['class'=>'form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('Description')}}
			{{Form::textarea('description', '', ['class'=>'ckeditor form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('Category')}}
			{{Form::select('category_id', $categories, '', ['class'=>'form-control'])}}
		</div>
		<hr>
		<div id="root"></div>
	{!! Form::close() !!}
@endsection
