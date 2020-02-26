@extends('layouts.app')
@section('content')
	
<section>
	<h3> Keywords: "{{$keywords}}" </h3>
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