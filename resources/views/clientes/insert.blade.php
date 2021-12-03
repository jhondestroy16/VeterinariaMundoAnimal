@extends('layouts.layout')

@section('titulo', 'Registrarse')

@section('content')
    <h1 class="texto-blanco pt-5 pb-3">Registrarse</h1>
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
    <!-- Mensajes de Verificación -->
    <div id="ok" class="alert alert-success ocultar" role="alert">
        Las Contraseñas coinciden ! (Procesando formulario ... )
    </div>
    <!-- Fin Mensajes de Verificación -->
    <form class="registro" action="{{ route('clientes.store') }}" method="post" id="formulario"
        onsubmit="verificarPasswords(); return false">
        @method('post')
        @csrf
        <div class="card mt-4">
            <div class="card-body shadow">
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="nombre" class="form-label texto my-2">
                                <h4> <b>Nombre</b> </h4>
                            </label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre"
                                value="{{ old('nombre') }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="apellido" class="form-label texto my-2">
                                <h4> <b>Apellido</b> </h4>
                            </label>
                            <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control"
                                value="{{ old('apellido') }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="email" class="form-label texto my-2">
                                <h4> <b>Email</b> </h4>
                            </label>
                            <input type="email" name="email" id="email" placeholder="name@example.com"
                                class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="direccion" class="form-label texto my-2">
                                <h4> <b>Direccion</b> </h4>
                            </label>
                            <input type="text" name="direccion" id="direccion" placeholder="Direccion"
                                class="form-control" value="{{ old('direccion') }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="telefono" class="form-label texto my-2">
                                <h4> <b>Telefono</b> </h4>
                            </label>
                            <input type="number" name="telefono" id="telefono" placeholder="1234567890"
                                class="form-control" value="{{ old('telefono') }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="contrasenia" class="form-label texto my-2">
                                <h4> <b>Contraseña</b> </h4>
                            </label>
                            <input type="password" name="contrasenia" id="contrasenia" placeholder="*******"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div id="error" class="alert alert-danger ocultar" role="alert">
                    Las Contraseñas no coinciden, vuelve a intentar !
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="contraseniaConfi" class="form-label texto my-2">
                                <h4> <b>Confirmar contraseña</b> </h4>
                            </label>
                            <input type="password" name="contraseniaConfi" id="contraseniaConfi" placeholder="*******"
                                class="form-control">
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
