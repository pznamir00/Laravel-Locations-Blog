@extends('layouts.app')
@section('content')

<section id="category-list">
  @forelse($posts as $post)
    <a href="/posts/{{$post->id}}" class="list-group-item list-group-item-action list-group-item-dark">
      <h3>{{$post->title}}</h3>
      <p>{{$post->location->street}} {{$post->location->number}}, {{$post->location->city}} {{$post->location->zipcode}}</p>
      <p>Author: {{$post->author}}, {{$post->created_at}}</p>
    </a>
  @empty
    <div class="text-center">
      <h3>No posts</h3>
      <br/>
      <a href="/" class="text-light">Return to home</a>
    </div>
  @endforelse
</section>

@endsection
