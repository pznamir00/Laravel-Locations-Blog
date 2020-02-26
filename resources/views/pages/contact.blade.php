@extends('layouts.app')
@section('content')

<h3> Contact with us </h3>

<br><br>

{!! Form::open(['action'=>'PageController@contact_submit', 'method'=>'POST']) !!}
	@csrf
	{{Form::label('Your email:')}}
	{{Form::text('email', '', ['class'=>'form-control'])}}
	<br>
	{{Form::label('Subject:')}}
	{{Form::text('subject', '', ['class'=>'form-control'])}}
	<br>
	{{Form::label('Your message:')}}
	{{Form::textarea('message', '', ['class'=>'form-control'])}}
	<br>
	{{Form::submit('Send', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

@endsection