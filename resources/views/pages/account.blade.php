@extends('layouts.app')
@section('title', '| My account')
@section('content')

<div id="account">
	<h3><i class="fa fa-user mr-3"></i>{{Auth::user()->name}}</h3>
	<hr>

	<div class="text-center text-md-left">
	    <a class="btn btn-primary" href="{{ route('add') }}" >Add new location</a>
	    <a class="btn btn-danger" href="{{ route('logout') }}"
	       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	        {{ __('Logout') }}
	    </a>
			<p class="float-md-right">You're here since {{Auth::user()->created_at}}</p>
	</div>
	<br><br>
  <div>
	  <h4>Your Locations</h4>
		@if(count($user_posts) > 0)
			@foreach($user_posts as $post)
				<a class="list-group-item list-group-item-dark pt-4" href="/posts/{{$post->id}}">
					<h6>{{$post->title}}</h6>
					<p>{{$post->location->street.' '.$post->location->number.', '.$post->location->city}}</p>
				</a>
			@endforeach
		@else
			<span>You have no locations yet</span>
		@endif
	</div>
</div>

@endsection
