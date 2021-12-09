@extends('layouts.layout')

@section('titulo', 'Editar horarios')

@section('content')
    <h2 class="text-center texto-blanco my-4">Editar horarios</h2>
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
    <form action="{{ route('clientes.update', $horario->id) }}" method="post" class="my-5">
        @method('put')
        @csrf
        <div class="card mt-4">
            <div class="card-body shadow">
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="nombre" class="form-label texto my-2">
                                <h4> <b>Fecha:</b> </h4>
                            </label>
                            <input type="date" name="fecha" id="fecha" class="form-control"
                                value="{{ $horario->fecha }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="nombre" class="form-label texto my-2">
                                <h4> <b>Hora:</b> </h4>
                            </label>
                            <input type="time" name="hora" id="hora" class="form-control" value="{{ $horario->hora }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="disṕonibilidad" class="form-label texto my-2">
                                <h4 class="texto">Disponibilidad</h4>
                            </label>
                            <select name="disṕonibilidad" class="form-control">
                                <option selected disabled value="">Seleccione...</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
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
