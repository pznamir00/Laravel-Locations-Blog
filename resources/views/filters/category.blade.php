@extends('layouts.app')
@section('title', '| $category->title')
@section('content')
	
<section>
	<h3> Category: {{$category->title}} </h3>
	<br>
	<br>
	@if(count($locations) > 0)
		@foreach($locations as $location)
			<a class="list-group-item" href="/locations/{{$location->id}}">
				<h4>{{$location->title}}</h4>
				<span>{{$location->address}}</span>
			</a>
		@endforeach
	@else
		<span> No locations </span>
	@endif
</section>

@endsection