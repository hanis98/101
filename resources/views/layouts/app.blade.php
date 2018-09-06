<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MPPG') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <img height="32px"
                src="{{asset('storage/img/logo_mppg_baharu.png')}}" alt="">
                
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'MPPG') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            @hasrole('admin')
                                <li class="nav-item dropright">
                                    <a id="manage-dropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Senarai... <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="manage-dropdown">
                                        <a class="dropdown-item" href="{{ route('user.index') }}">
                                            {{ __('Pengguna') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('department.index') }}">
                                            {{ __('Jabatan/Unit/Bahagian') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('peralatan.index') }}">
                                            {{ __('Peralatan') }}
                                        </a>
                                    </div>
                                </li>
                            @endhasrole
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropleft">
                                <a id="application-dropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Permohonan <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="application-dropdown">
                                    <a class="dropdown-item" href="{{ route('application.index') }}">
                                        {{ __('Senarai Permohonan') }}
                                    </a>
                                    @can('can approve')
                                        <a class="dropdown-item" href="{{ route('approval.index') }}">
                                            {{ __('Senarai Kelulusan') }}
                                        </a>
                                    @endcan
                                    @can('can authorize')
                                        <a class="dropdown-item" href="{{ route('authorize.index') }}">
                                            {{ __('Senarai Pengesahan') }}
                                        </a>
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('application.create') }}">
                                        {{ __('Borang Permohonan') }}
                                    </a>
                                </div>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="https://picsum.photos/24?random" alt="Picsum" class="rounded">
                                    {{ Auth::user()->name }} 
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('about-us') }}">{{ __('Tentang Kami') }}</a>
                                    <a class="dropdown-item" href="{{ route('contact-us') }}">{{ __('Hubungi Kami') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    @include('sweetalert::cdn')
    @include('sweetalert::view')
    @include('vendor.sweetalert.validator')
    @stack('scripts')
</body>
</html>