@extends('layouts.layout')

@section('titulo', 'Servicios')
@section('content')

    <h2 class="texto-blanco pt-5 pb-3">Datos del servicio</h2>
    <div class="card mt-4 mb-3">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-sm-3">
                    <h3>Nombre:</h3>
                </div>
                <div class="col-sm-3">
                    <p>{{ $servicio->nombre }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h3>Descripcion:</h3>
                </div>
                <div class="col-sm-3">
                    <p>{{ $servicio->descripcion }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h3>Valor del servicio:</h3>
                </div>
                <div class="col-sm-3">
                    <p>$ {{ number_format($servicio->valor, 2, ',', '.') }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h3>Duracion del servicio:</h3>
                </div>
                <div class="col-sm-3">
                    <p>@if ($servicio->duracion > '00:30:00')
                            Una hora
                        @else
                            Media hora
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('servicios.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
@endsection
