@extends('layouts.app')
@section('content')

	{!! Form::open(['action' => 'LocationController@add_action', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
		<div class="form-group">
			@csrf
			{{Form::label('Title')}}
			{{Form::text('title', '', ['class'=>'form-control'])}}
			<br>
			{{Form::label('Address')}}
			{{Form::text('address', '', ['class'=>'form-control'])}}
			<br>
			{{Form::label('Description')}}
			{{Form::textarea('description', '', ['class'=>'ckeditor form-control'])}}
			<br><br>
			{{Form::label('Category')}}
			{{Form::select('category', $categories, '', ['class'=>'form-control'])}}
			<br><br>
			{{Form::submit('Add', ['class'=>'btn btn-primary'])}}
		</div>
	{!! Form::close() !!}
@endsection