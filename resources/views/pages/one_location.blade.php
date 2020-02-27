@extends('layouts.app')

@section('content')

<div id="location">

	<!-- LOCATION -->
	<h1>{{$location->title}}</h1>

	<h5>Address: {{$location->address}}</h5>

	<h5>
		Category: 
		<a href="/category/{{$cat}}">{{$cat}}</a>
	</h5>

	<hr>

	<p>
		{!!$location->description!!}
	</p>

	<!-- AUTHORS OPTIONS -->
	@if(Auth::check())
		@if(Auth::user()->name == $location->author)
			<div class="text-right">
				<a class="btn btn-light" href="/locations/edit/{{$location->id}}">Edit</a>
				<br><br>
				{!! Form::open(['action'=>['LocationController@delete', $location->id], 'method'=>'POST']) !!}
					@csrf
					{{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
				{!! Form::close() !!}
			</div>
		@endif
	@endif

	<hr>

	<!-- COMMENTS -->
	<div id="comments">
		<h3> Comments </h3>
		<br>
		@comments([
		    'model' => $location,
		    'approved' => true
		])
	</div>

</div>

@endsection