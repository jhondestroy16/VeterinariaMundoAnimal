@extends('layouts.layout')

@section('titulo', 'Crear mascota')
@section('content')
    <h1 class="texto-blanco pt-5 pb-3">Registrar nueva mascota</h1>
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
    <form action="{{ route('mascotas.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="card mt-4 mb-3">
            <div class="card-body shadow">
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="nombre" class="form-label texto my-2">
                                <h4 class="texto">Nombre</h4>
                            </label>
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre de la mascota" class="form-control"
                                value="{{ old('nombre') }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="especie" class="form-label texto my-2">
                                <h4 class="texto">Especie</h4>
                            </label>
                            <input type="text" name="especie" id="especie" placeholder="Especie de la mascota Ej. perro, gato"
                                class="form-control" value="{{ old('especie') }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="raza" class="form-label texto my-2">
                                <h4 class="texto">Raza</h4>
                            </label>
                            <input type="text" name="raza" id="raza" placeholder="Raza de la mascota Ej. mestizo"
                                class="form-control" value="{{ old('raza') }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="selectorEdad" class="form-label texto my-2">
                                <h4 class="texto">Edad años o meses</h4>
                            </label>
                            <select name="selectorEdad" class="form-control" id="selectorEdad">
                                <option selected disabled value="">Seleccione...</option>
                                <option value="1">Años</option>
                                <option value="2">Meses</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="edad" class="form-label texto my-2">
                                <h4 class="texto">Edad</h4>
                            </label>
                            <input type="number" name="edad" id="edad" placeholder="Edad de la mascota" class="form-control"
                                value="{{ old('edad') }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="clienteId" class="form-label texto my-2">
                                <h4 class="texto">Dueño</h4>
                            </label>
                            <select name="clienteId" class="form-control" id="clienteId">
                                <option selected disabled value="">Seleccione...</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" @if (old('clienteId') == $cliente->id) selected
                                @endif>
                                {{ $cliente->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary my-4"> Guardar </button>
        </div>
    </form>
@endsection
