@extends('layouts.layout')

@section('titulo', 'Citas')
@section('content')
    <h2 class="texto-blanco pt-5 pb-3">Citas</h2>
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
                    <th>Estado</th>
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
                        <td> {{ $cita->estado }} </td>
                        <td>
                            @can('citas')
                                <a href="{{ route('citas.show', $cita->id) }}" class="btn btn-info">Detalles</a>
                                <form action="{{ route('citas.destroy', $cita->id) }}" method="post" class="d-inline-flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('¿Desea cancelar la cita?')">Cancelar cita</button>
                                </form>
                                <form action="{{ route('citas.update', $cita->id) }}" method="post" class="d-inline-flex">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-primary"
                                        onclick="return confirm('¿Desea confirmar la cita?')">Aceptar cita</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="texto-blanco">No hay citas registradas</p>
    @endif
@endsection
