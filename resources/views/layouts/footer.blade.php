<footer>
    <ul class="list-group">
        <a href="/"><i class="fa fa-home"></i>Home</a>
        <a href="{{ route('about-us') }}"><i class="fa fa-info"></i>About us</a>
        <a href="{{ route('contact') }}"><i class="fa fa-envelope"></i>Contact</a>
    </ul>
    <hr>
    <h4>Categories</h4>
    <ul class="list-group">
      @foreach(App\Category::all() as $category)
        <a href="/posts/category/{{$category->slug}}">{{$category->title}}</a>
      @endforeach
    </ul>
    <div class='c-py-rights'>
      {{ date('m/d/Y') }} All rights reserved &copy
    </div>
</footer>
