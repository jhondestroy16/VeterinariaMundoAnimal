@extends('layouts.layout')

@section('titulo', 'Citas')
@section('content')
    <h1 class="texto-blanco pt-5 pb-3">Citas</h1>
    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            {{-- <button type="button" class="btn-close" aria-label="Close"></button> --}}
        </div>
    @endif
    @if ($cantidad > 0)
        <table class="table table-hover table-bordered table-striped mb-4">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora cita inicio</th>
                    <th>Hora cita fin</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                    <tr>
                        <td> {{ $cita->fechaCita }} </td>
                        <td> {{ $cita->horaCita }} @if ($cita->horaCita < '12:00:00')
                                AM
                            @else
                                PM
                            @endif
                        </td>
                        <td> {{ $cita->horaCitaFin }} @if ($cita->horaCitaFin < '12:00:00')
                            AM
                        @else
                            PM
                        @endif
                    </td>
                        <td> {{ $cita->descripcion }} </td>
                        <td>
                            <a href="{{ route('citas.show', $cita->id) }}" class="btn btn-info">Detalles</a>
                            {{-- <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning">Editar</a> --}}
                            <form action="{{ route('citas.destroy', $cita->id) }}" method="post" class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Desea cancelar la cita?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <p class="texto-blanco">No hay citas registradas</p>
    @endif
@endsection
