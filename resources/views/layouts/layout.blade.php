<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">
                <img src="{{ asset('img/descarga.png') }}" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('mascotas.create') }}" id="dropMascotas" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mascotas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('mascotas.index') }}">Listar</a></li>
                            <li><a class="dropdown-item" href="{{ route('mascotas.create') }}">Registrar mascota</a>
                            </li>
                        </ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('clientes.create') }}" id="dropCitas" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Clientes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('clientes.index') }}">Listar</a></li>
                            <li><a class="dropdown-item" href="{{ route('clientes.create') }}">Registrar cliente</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('servicios.create') }}" id="dropServicios" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Servicios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('servicios.index') }}">Listar</a></li>
                            <li><a class="dropdown-item" href="{{ route('servicios.create') }}">Registrar servicios</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('citas.create') }}" id="dropServicios" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Citas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('citas.index') }}">Listar</a></li>
                            <li><a class="dropdown-item" href="{{ route('citas.create') }}">Solicitar cita</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('horarios.create') }}" id="dropServicios" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Horarios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('horarios.index') }}">Listar</a></li>
                            <li><a class="dropdown-item" href="{{ route('horarios.create') }}">Registrar horario</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer class="card-footer text-muted texto-blanco footer">
        Desarrollado por <span class="fw-bold">Jhon Steven Valencia Guzmán</span> &copy; 2021
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>