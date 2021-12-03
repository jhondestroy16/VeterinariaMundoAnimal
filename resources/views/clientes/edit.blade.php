@extends('layouts.layout')

@section('titulo', 'Editar datos')

@section('content')
<h1 class="text-center texto-blanco my-4">Editar datos</h1>
@if ($errors->any())

<div class ="alert alert-danger">
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
<form action="{{ route('clientes.update', $cliente->id) }}" method="post" class="my-5">
    @method('put')
    @csrf
    <div class="card mt-4 mb-3">
        <div class="card-body shadow">
    <div class = "mb-2">
        <label for="nombre" class="form-label texto my-2"><h4>Nombre completo</h4></label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" value="{{ $cliente->nombre }}">
    </div>
    <div class = "mb-2">
        <label for="apellido" class="form-label texto my-2"><h4>Apellido</h4></label>
        <input type="text" name="apellido" id="apellido" placeholder="apellido" class="form-control" value="{{ $cliente->apellido }}">
    </div>
    <div class = "mb-2">
        <label for="email" class="form-label texto my-2"><h4>Email</h4></label>
        <input type="email" name="email" id="email" placeholder="name@example.com" class="form-control" value="{{ $cliente->email }}"">
    </div>
    <div class = "mb-2">
        <label for="direccion" class="form-label texto my-2"><h4>Direccion</h4></label>
        <input type="text" name="direccion" id="direccion" placeholder="Direccion" class="form-control" value="{{ $cliente->direccion }}"">
    </div>
    <div class = "mb-2">
        <label for="telefono" class="form-label texto my-2"><h4>Telefono</h4></label>
        <input type="number" name="telefono" id="telefono" placeholder="1234567890" class="form-control" value="{{ $cliente->telefono }}"">
    </div>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary my-4"> Guardar </button>
    </div>
</form>
@endsection
