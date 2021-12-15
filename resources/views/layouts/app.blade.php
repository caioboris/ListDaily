<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ListDaily</title>

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div id="header" style="margin: auto">
            <div style="max-width: 100%;display: flex;
            align-items: center;
            justify-content: space-between;" class="container p-0 mr-1 ml-1">

                <div>
                    <a href="#" style="color: black; text-decoration: none;" class="dropdown-toggle ml-1"
                        data-toggle="dropdown">
                        {{ Config::get('languages')[App::getLocale()] }}
                    </a>
                    <div class="dropdown-menu">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <li>
                                    <a style="color: black; margin-left: 1rem;"
                                        href="{{ route('lang.switch', $lang) }}">@lang('welcome.' . $language)</a>
                                </li>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div style="position: absolute; left:50%; margin-left:-55px; top: 12px;">
                    <a href="{{ url('/') }}">
                        <img src="/img/logo2.png" alt="Logo" width="110px" height="30px" />
                    </a>
                </div>

                <!-- Right Side Of Navbar -->
                <div>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <a style="color: black" class="nav-link"
                                href="{{ route('login') }}">@lang('welcome.login')</a>
                        @endif

                        @if (Route::has('register'))
                            <a style="color: black" class="nav-link"
                                href="{{ route('register') }}">@lang('welcome.register')</a>
                        @endif
                    @else
                        <a style="color: black;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
