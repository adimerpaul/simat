<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Registro
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <router-link
                            to="/home"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-home"></i> home

                                </a>
                            </li>
                        </router-link>
                        @if(Auth::user())
                        <router-link
                            to="/contribuyente"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-user"></i> Contribuyente
                                </a>
                            </li>
                        </router-link>
                        <router-link
                            to="/buscar"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-search"></i> Buscar

                                </a>
                            </li>
                        </router-link>
                        <router-link
                            to="/inmueble"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-hand-holding-medical"></i> inmuebles

                                </a>
                            </li>
                        </router-link>
                        @if (Auth::user()->id==99999)
                        <router-link
                            to="/registro"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-hand-holding-medical"></i> Registro Usr

                                </a>
                            </li>
                        </router-link>
                            @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif


                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
