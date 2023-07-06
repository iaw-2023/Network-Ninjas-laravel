<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Carfects</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body style="background-color: white;">
    <div id="app">
    <style>
        *{
            font-size:16px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .nav-link{
            color:#fff;
            transition: all .7s ease-in-out;
            margin-left: 1rem;
        }
        .nav-link:hover{
            background-color: #fff;
            color:blueviolet;
            border-radius:2rem;
        }
    </style>
        <nav class="navbar navbar-expand-md bg-indigo" style="background-color: blueviolet;">
            <div class="container" style="font-family: system-ui;">
                <a class="navbar-brand" style="color: #fff; font-weight:500;" href="{{ url('/') }}">
                    CarFects
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @Auth
                        @if(Auth::user()->rol =='admin' || Auth::user()->rol == 'cargador')
                            <a class="nav-link" href="{{route('producto.index')}}">Productos</a>
                        @endif
                        @if(Auth::user()->rol =='admin' || Auth::user()->rol == 'cargador')
                            <a class="nav-link"  href="{{route('categorium.index')}}">Categorias</a>
                        @endif
                        @if(Auth::user()->rol =='admin' || Auth::user()->rol == 'ventas')
                            <a class="nav-link"  href="{{route('pedido.index')}}">Pedidos</a>
                        @endif
                        @if(Auth::user()->rol =='admin' || Auth::user()->rol == 'cargador')
                            <a class="nav-link" href="{{ route('cliente.index') }}">Clientes</a>
                        @endif
                        @endAuth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"  style="color: #fff; class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="background-color:white;">
            @yield('content')
        </main>
    </div>
</body>
</html>
