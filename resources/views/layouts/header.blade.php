<header>
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6 text-center">
        <a href="/" id="logo">Wonderfull<span style="color: #6ed962;">P</span>lace</a>
      </div>
      <div id="pages" class="col-12 col-lg-6">
          <a href="/">Home</a>
          <a href="{{ route('about-us') }}">About us</a>
          <a href="{{ route('contact') }}">Contact</a>
          <a>|</a>
          @guest
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          @else
              <div class="dropdown d-inline-block">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="account" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('account') }}">{{ __('Your profile') }}</a>
                  <a class="dropdown-item" href="{{ route('add') }}">{{ __('Add location') }}</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
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
      <div id="search-panel"></div>
    </div>
  </div>
</header>
