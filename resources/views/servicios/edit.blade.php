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
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="nombre" class="form-label texto my-2">
                                <h4 class="texto">Nombre</h4>
                            </label>
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre completo"
                                class="form-control" value="{{ $servicio->nombre }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="descripcion" class="form-label texto my-2">
                                <h4 class="texto">Descripcion</h4>
                            </label>
                            <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion"
                                class="form-control" value="{{ $servicio->descripcion }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="valor" class="form-label texto my-2">
                                <h4 class="texto">Valor del servicio</h4>
                            </label>
                            <input type="number" name="valor" id="valor" placeholder="$1000" class="form-control"
                                value="{{ $servicio->valor }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <div class="mb-2">
                                <label for="mascotaId" class="form-label texto my-2">
                                    <h4 class="texto">Duracion del servicio</h4>
                                </label>
                                <select name="duracion" class="form-control">
                                    <option selected disabled value="{{ $servicio->duracion }}">
                                        {{ $servicio->duracion }}</option>
                                    <option value="00:30:00">30 minutos</option>
                                    <option value="01:00:00">1 hora</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary my-2"> Guardar </button>
        </div>
    </form>
@endsection
