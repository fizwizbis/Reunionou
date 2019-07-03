<nav class="navbar navbar-expand-md is-primary">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name', 'Reunionou') }}</a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbar">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbar" class="navbar-menu">
            <!-- Left Side Of Navbar -->
            <div class="navbar-start"></div>

            <!-- Right Side Of Navbar -->
            <div class="navbar-end">
                <!-- Authentication Links -->
                @guest
                    <a class="navbar-item{{ URL::current() == route('login') ? ' is-active' : '' }}"
                       href="{{ route('login') }}">{{ __('auth.login') }}</a>
                    @if (Route::has('register'))
                        <a class="navbar-item{{ URL::current() == route('register') ? ' is-active' : '' }}" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                    @endif
                @else
                    <li class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('profil') }}">
                                Mon espace
                            </a>
                            <a class="navbar-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('auth.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
        </div>
    </div>
</nav>
