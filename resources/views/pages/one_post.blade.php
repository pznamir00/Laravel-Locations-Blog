@extends('layouts.app')

@section('content')

<div id="post">
	<h1>{{$post->title}}</h1>
	<hr>
	<h6>{{ $post->location->street.' '.$post->location->address_number.', '.$post->location->city.' '.$post->location->zipcode }}</h6>
	<h6 class="category">Category >> <a href="/posts/category/{{$post->category->slug}}">{{$post->category->title}}</a></h6>
	<p class="mt-5 pt-5">
		{!!$post->description!!}
		<img src="/media/{{$post->image->name}}" src="Post image" class="post-main-image" />
	</p>

	<!-- AUTHORS OPTIONS -->
	@if(Auth::check())
		@if(Auth::user()->name == $post->author)
			<div class="text-right">
				<a class="btn btn-light" href="/posts/edit/{{$post->id}}">Edit</a>
				<br><br>
				{!! Form::open(['action'=>['PostController@delete', $post->id], 'method'=>'DELETE']) !!}
					@csrf
					{{Form::hidden('post_id', $post->id)}}
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
		    'model' => $post,
		    'approved' => true
		])
	</div>
</div>

@endsection
