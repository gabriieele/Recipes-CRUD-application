<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class=" container nav-cont justify-content-center">
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                <form class="d-flex input-group search m-0" role="search" method="GET" action="{{ route('search') }}">
                
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="q" >
      <button class="btn search-btn" type="submit"><i class="bi bi-search"></i></button>
    </form>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav py-3">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                @if (auth()->check())
      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('myRecipes') }}">My recipes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('newRecipe') }}">Upload a recipe</a>
                                </li>
                                
                                @endif
                          
                        @endguest
                    </ul>
                <!-- </div> -->
            </div>
        </nav>
</header>
        <main class="d-flex flex-column min-vh-100">
            @yield('content')
        </main>
        <footer class="text-center py-3 shadow">@include('layouts.footer')</footer>
        
    </div>
</body>
</html>
