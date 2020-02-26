@extends('layouts.app')
@section('title', '| My account')
@section('content')

<div id="account">
	<h3> {{Auth::user()->name}} </h3>

	<section>
	    <a class="btn btn-secondary" href="{{ route('add') }}" >Add new location</a>

	    <br>

	    <a class="btn btn-danger" href="{{ route('logout') }}"
	       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	        {{ __('Logout') }}
	    </a>
	</section>

	<br><br>

    <section>
	    <h4> Your Locations </h4>
		@if(count($user_locations) > 0)
			@foreach($user_locations as $location)
				<a class="list-group-item" href="/locations/{{$location->id}}">
					<h4>{{$location->title}}</h4>
					<span>{{$location->address}}</span>
				</a>
			@endforeach
		@else
			<span> You don't have any locations </span>
		@endif
	</section>
</div>

@endsection