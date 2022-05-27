<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.5">

        <title>@yield('title') | E-Events | Daet, Camarines Norte</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles
    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-primary bg-gradient shadow sticky-top">
                <div class="container">
                    <a class="navbar-brand p-0" href="{{ url('/') }}">
                        <h5 class="text-white">CamNorteTourism&Guidelines</h5>
                    </a>
                    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span> Menu
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        @auth
                        <ul class="navbar-nav me-auto">
                            <h5 class="text-white fw-bold text-center">Administrator Dashboard</h5>
                        </ul>
                        @endauth

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @auth
                                <a class="btn btn-danger fw-bold" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <x-feathericon-log-out/> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @elseif (!request()->is('login'))
                                <a class="btn btn-warning fw-bold" href="{{ route('login') }}">
                                    <x-feathericon-lock/> Login Page
                                </a>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>

            <footer class="p-3 bg-primary bg-gradient fixed-bottom d-none d-sm-block">
                
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
