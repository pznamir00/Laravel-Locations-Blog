@extends('layouts.app')
@section('content')

	{!! Form::open(['action' => ['LocationController@edit_action', $location->id], 'method' => 'POST']) !!}
		<div class="form-group">
			@csrf
			{{Form::label('Title')}}
			{{Form::text('title', $location->title, ['class'=>'form-control'])}}
			<br>
			{{Form::label('Address')}}
			{{Form::text('address', $location->address, ['class'=>'form-control'])}}
			<br>
			{{Form::label('Description')}}
			{{Form::textarea('description', $location->description, ['class'=>'ckeditor form-control'])}}
			<br><br>
			{{Form::label('Category')}}
			{{Form::select('category', $categories, $location->category - 1, ['class'=>'form-control'])}}
			<br><br>
			{{Form::submit('Update', ['class'=>'btn btn-primary'])}}
		</div>
	{!! Form::close() !!}

@endsection