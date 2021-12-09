@extends('layouts.layout')
@section('titulo', 'Mascotas')
@section('content')
    <h2 class="texto-blanco pt-5 pb-3">Mascota</h2>
    @if($mensaje = Session::get('exito'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $mensaje }}</p>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
    </div>
    @endif
    @if ($cantidad > 0)
    <table class="table table-hover table-bordered table-striped alto-100">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mascotas as $mascota)
                <tr>
                    <td> {{ $mascota->nombre }} </td>
                    <td> {{ $mascota->especie }} </td>
                    <td>
                        <a href="{{ route('mascotas.show', $mascota->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="post" class="d-inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Desea eliminar la mascota  {{ $mascota->nombre }}?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="texto-blanco">No hay mascotas registradas <a href="{{ route('mascotas.create') }}">¿Desea registrar una mascota?</a></p>
    @endif
@endsection
