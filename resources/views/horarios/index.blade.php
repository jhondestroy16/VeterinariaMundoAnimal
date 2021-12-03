@extends('layouts.layout')

@section('titulo', 'Horarios')
@section('content')
    <h1 class="text-center pt-5 pb-3 texto-blanco texto">Horarios</h1>
    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            {{-- <button type="button" class="btn-close" aria-label="Close"></button> --}}
        </div>
    @endif
    @if ($cantidad > 0)
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Disponibilidad</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                    <tr>
                        <td> {{ $horario->fecha }} </td>
                        <td> {{ $horario->hora }} </td>
                        <th>{{ $horario->disponibilidad }}</th>
                        <td>
                            <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('horarios.destroy', $horario->id) }}" method="post"
                                class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Desea eliminar el horario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <p class="texto-blanco">
        No hay horario establecido
    </p>
    @endif
@endsection
