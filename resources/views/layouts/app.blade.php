<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PZAPP @yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/one_location.css') }}" rel="stylesheet">
    <link href="{{ asset('css/about-us.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
    <header>
        <a href="/" id="logo"> GOODPLACE </a>
        @guest
            <a class="nav-link header-item" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="nav-link header-item" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <div class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('account') }}" class="dropdown-item"> My account </a>
                    <br>
                    <a href="{{ route('add') }}}" class="dropdown-item">Add new location</a>
                    <br>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>
                <a id="navbarDropdown" class="nav-link dropdown-toggle header-item" href="account" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
            </div>
        @endguest
        <div id="pages">
            <a href="/"> Home </a>  
            <a href="{{ route('about-us') }}"> About us </a>  
            <a href="{{ route('contact') }}"> Contact </a> 

            <div class="dropdown show" style="float: left">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories <span class="caret"></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach(App\Category::all() as $cat)
                    <a class="dropdown-item" href="/category/{{$cat->title}}">{{$cat->title}}</a>
                    <br>
                @endforeach
              </div>
            </div>
        </div>
        <form action="/keywords" method="get" id="keywords-form" class"md-form active-pink active-pink-2 mb-3 mt-0">
            <input type="search" class="form-control" name="keywords" placeholder="Search"/>
        </form>
    </header>
    <main class="py-4">
        @include('messages.messages')
        @yield('content')
    </main>
    <footer>
        <ul class="list-group">
            <a href="/"> Home </a><br>
            <a href="{{ route('about-us') }}"> About us </a>  
            <a href="{{ route('contact') }}"> Contact </a> 
        </ul>
        <div class="text-left" style="margin-left: 20px;">
            Cartegories:
            <ul> 
                @foreach(App\Category::all() as $cat)
                    <a href="/category/{{$cat->title}}">{{$cat->title}}</a>
                @endforeach
            </ul>
        </div>
        <div>{{ date('m/d/Y') }} All rights reserved &copy</div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
</body>
</html>
