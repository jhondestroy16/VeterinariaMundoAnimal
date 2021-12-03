@extends('layouts.layout')

@section('titulo', 'Clientes')
@section('content')
    <h1 class="text-center pt-5 pb-3 texto-blanco texto">Cliente</h1>
    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
        </div>
    @endif
    @if ($cantidad > 0)
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td> {{ $cliente->nombre }} </td>
                    <td> {{ $cliente->apellido }} </td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post" class="d-inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Desea eliminar el cliente  {{ $cliente->nombre }}?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="texto-blanco">
            No hay clientes registrados
        </p>
    @endif
@endsection
