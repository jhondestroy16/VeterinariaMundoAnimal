@extends('layouts.layout')

@section('titulo', 'Editar mascota')

@section('content')

    <h2 class="texto-blanco pt-5 pb-3">Editar datos de la mascota <b>{{ $mascota->nombre }}</b></h2>
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
    <form action="{{ route('mascotas.update', $mascota->id) }}" method="post" class="my-5">
        @method('put')
        @csrf
        <div class="card mt-4 mb-3">
            <div class="card-body shadow">
                <div class="mb-3">
                    <label for="nombre" class="form-label texto my-2">
                        <h4>Nombre</h4>
                    </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control"
                        value="{{ $mascota->nombre }}">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label texto my-2">
                        <h4>Especie</h4>
                    </label>
                    <input type="text" name="especie" id="especie" placeholder="Especie" class="form-control"
                        value="{{ $mascota->especie }}">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label texto my-2">
                        <h4>Raza</h4>
                    </label>
                    <input type="text" name="raza" id="raza" placeholder="Raza" class="form-control"
                        value="{{ $mascota->raza }}">
                </div>
                <div class="mb-3">
                    <label for="selectorEdad" class="form-label texto my-2">
                        <h4>Edad años o meses</h4>
                    </label>
                    <select name="selectorEdad" class="form-select" id="selectorEdad">
                        <option selected disabled value="">Seleccione...</option>
                        <option value="1">Años</option>
                        <option value="2">Meses</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label texto my-2">
                        <h4>Edad</h4>
                    </label>
                    <input type="text" name="edad" id="edad" placeholder="Edad" class="form-control"
                        value="{{ $mascota->edad }}">
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary my-2"> Guardar </button>
        </div>
    </form>

@endsection
