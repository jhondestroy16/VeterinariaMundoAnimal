@extends('layouts.app')
@section('titulo', 'Control')
@section('content')

    <body class="alto-100">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="titulo-principal texto-blanco texto">Mundo animal</div>
            <div class="row">
                <div class="col text-center fs-3"><a href="{{ route('clientes.index') }}"
                        class="text-decoration-none">Clientes</a></div>
                <div class="col text-center fs-3"><a href="{{ route('mascotas.index') }}"
                        class="text-decoration-none">Mascotas</a></div>
                <div class="col text-center fs-3"><a href="{{ route('servicios.index') }}"
                        class="text-decoration-none">Servicios</a></div>
                <div class="col text-center fs-3"><a href="{{ route('citas.index') }}"
                        class="text-decoration-none">Citas</a></div>
            </div>
        </div>
    </body>
@endsection
