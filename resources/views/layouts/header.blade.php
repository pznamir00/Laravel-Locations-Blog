<header>
  <nav class="navbar-expand-lg navbar-dark">
    <nav class="navbar navbar-brand ml-1 ml-lg-5 mr-0 pr-0">
      <a href="/" id="logo">Wonderfull<span style="color: #6ed962;">P</span>lace</a>
    </nav>
    <button class="navbar-toggler ml-auto float-right mr-4 mt-1" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars ml-2"></i>
    </button>
    <nav class="navbar-expand-lg navbar-dark d-lg-inline-block ml-5">
      <div id="menu" class="collapse navbar-collapse">
        <a href="/" class="nav-link d-block d-lg-inline-block"><i class="fa fa-home"></i>Home</a>
        <a href="{{ route('about-us') }}" class="nav-link d-block d-lg-inline-block"><i class="fa fa-info"></i>About us</a>
        <a href="{{ route('contact') }}" class="nav-link d-block d-lg-inline-block"><i class="fa fa-envelope"></i>Contact</a>
        @guest
            <a class="nav-link auth-link d-lg-inline-block" href="{{ route('login') }}"><i class="fa fa-user"></i>{{ __('Login') }}</a>
            <a class="nav-link auth-link d-lg-inline-block" href="{{ route('register') }}"><i class="fa fa-sign-in"></i>{{ __('Register') }}</a>
        @else
            <div class="dropdown d-inline-block" style="max-width: 200px;">
              <a id="navbarDropdown" class="nav-link dropdown-toggle auth-link mr-0" href="account" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item bg-dark text-light" href="{{ route('account') }}">{{ __('Your profile') }}</a>
                <a class="dropdown-item bg-dark text-light" href="{{ route('add') }}">{{ __('Add location') }}</a>
                <a class="dropdown-item bg-dark text-light" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Sign out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
              </div>
            </div>
        @endguest
      </div>
    </nav>
  </nav>
  <div id="search-panel"></div>
</header>
