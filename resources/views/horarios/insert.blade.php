@extends('layouts.layout')

@section('titulo', 'Registrarse')

@section('content')
    <h1 class="texto-blanco pt-5 pb-3">Registrar horario</h1>
    @if ($errors->any())

        <div class="alert alert-danger">
            <div class="header">
                <strong>Ups...</strong>algo salio mal
            </div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <form class="registro" action="{{ route('horarios.store') }}" method="post" id="formulario"
        onsubmit="verificarPasswords(); return false">
        @method('post')
        @csrf
        <div class="card mt-4">
            <div class="card-body shadow">
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="nombre" class="form-label texto my-2">
                                <h4> <b>Fecha:</b> </h4>
                            </label>
                            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="nombre" class="form-label texto my-2">
                                <h4> <b>Hora:</b> </h4>
                            </label>
                            <input type="time" name="hora" id="hora" class="form-control" value="{{ old('hora') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary my-4" id="guardar"> Guardar </button>
        </div>
    </form>
@endsection
