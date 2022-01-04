@extends('layouts.layout')

@section('titulo', 'Registro')

@section('content')
    <h2 class="texto-blanco pt-5 pb-3">Registrar servicio</h2>
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
    <form action="{{ route('servicios.store') }}" method="post" class="my-3">
        @method('post')
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
                                class="form-control" value="{{ old('nombre') }}">
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
                                class="form-control" value="{{ old('descripcion') }}">
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
                                value="{{ old('valor') }}">
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
                                    <option selected disabled value="">Seleccione...</option>
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
            <button type="submit" class="btn btn-primary my-4" id="guardar"> Guardar </button>
        </div>
    </form>
@endsection
