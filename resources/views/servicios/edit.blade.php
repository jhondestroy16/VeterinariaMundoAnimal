@extends('layouts.layout')

@section('titulo', 'Editar servicio')

@section('content')
    <h2 class="texto-blanco">Editar servicio</h2>
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
    <form action="{{ route('servicios.update', $servicio->id) }}" method="post" class="my-5">
        @method('put')
        @csrf
        <div class="card mt-4 mb-3">
            <div class="card-body shadow">
                <div class="mb-2">
                    <label for="nombre" class="form-label texto my-2">
                        <h4>Nombre</h4>
                    </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control"
                        value="{{ $servicio->nombre }}">
                </div>
                <div class="mb-2">
                    <label for="descripcion" class="form-label texto my-2">
                        <h4>Descripcion</h4>
                    </label>
                    <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control"
                        value="{{ $servicio->descripcion }}">
                </div>
                <div class="mb-2">
                    <label for="valor" class="form-label texto my-2">
                        <h4>Valor del servicio</h4>
                    </label>
                    <input type="number" name="valor" id="email" placeholder="$1000" class="form-control"
                        value="{{ $servicio->valor }}"">
                </div>
                <div class="   mb-2">
                    <label for="duracion" class="form-label texto my-2">
                        <h4>Duracion del servicio</h4>
                    </label>
                    <input type="time" id="duracion" class="form-control" name="duracion">
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary my-2"> Guardar </button>
        </div>
    </form>
@endsection
