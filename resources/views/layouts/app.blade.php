<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ mix('js/app.js') }}" defer></script>

    {{-- <script src="sweetalert2.all.min.js"></script> --}}

    
</head>
<body style="background-image: url('{{ asset('img/back11.jpg') }}'); background-size: cover;">
    <div id="app">
        

        <nav class="navbar navbar-expand-lg navbar-dark" style="background: #3e4042; opacity: 0.9">
            <div class="container px-lg-5">
                <a class="navbar-brand" href="{{ route('home') }}">Vanvremenska prognoza</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('gradovi') }}">{{ __('Gradovi') }}</a></li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @endif
                            @else
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                            </form>
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>

       

        <main class="py-4">
            @yield('content')
        </main>

         <!-- Footer-->
         <footer class="py-5" style="position: scrool; bottom: 0; width: 100%; background: #3e4042; opacity:0.9">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Nikola Zivkovic 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script> --}}
        <!-- Core theme JS-->
        {{-- <script src="js/scripts.js"></script> --}}
        
    </div>
</body>
</html>
