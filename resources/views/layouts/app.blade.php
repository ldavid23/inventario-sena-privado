<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <title>SEGUIMIENTO | CNCA </title>


    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <!-- Bootstrap Style -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap - Icon Style -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <!-- DataTablets Style -->
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <header>
        <img src="{{ asset('img/logoSena.png') }}" alt="Logo de la empresa" class="logo">

        <h1>APP SEGUIMIENTO CNCA</h1>

        <div class="navigetion ">

            <a href="{{route('coordinators')}}">Coordinaciones</a>
            <a href="{{route('funcionarios')}}">Funcionarios</a>
            <a href="">Distribucion</a>
            <a href="">Evaluaciones</a>
            <a href="">Reporte</a>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

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

        </div>

    </header>

    <main>

        @yield('content')
    </main>



    <!--Script-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
