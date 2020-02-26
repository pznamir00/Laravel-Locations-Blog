@extends('layouts.app')

@section('title') | Home @endsection

@section('content')

<div id="location-list">

	<div id="background">
		<img src="{{asset('bg.jpg')}}" alt="Background"/>
	</div>

	<h3> Locations: </h3>
	<br>
	<br>
	@if(count($locations) > 0)
		@foreach($locations as $location)
			<a class="list-group-item" href="/locations/{{$location->id}}">
				<h4>{{$location->title}}</h4>
				<span>{{$location->address}}</span>
			</a>
		@endforeach
	@endif
</div>

@endsection