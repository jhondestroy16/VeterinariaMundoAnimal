@extends('layouts.layout')

@section('titulo', 'Clientes')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Usuario</div>
                        <p class="card-category">Vista detallada de <b>{{ $cliente->nombre }}
                                {{ $cliente->apellido }} </b>
                        </p>
                    </div>
                    <!--body-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 my-3">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="author">
                                            <h5 class="title mt-3 text-center"><strong>{{ $cliente->nombre }}
                                                    {{ $cliente->apellido }} </strong></h5>
                                            <p class="description text-center">
                                                <b>Email: </b> {{ $cliente->email }} <br>
                                                <b>Direccion: </b> {{ $cliente->direccion }} <br>
                                                <b>Telefono: </b> {{ $cliente->telefono }} <br>
                                                <b>Fecha registro: </b> {{ $cliente->created_at }} <br>
                                                <b>Ultima modificacion: </b> {{ $cliente->updated_at }} <br>
                                            </p>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--end card user-->

                            <div class="col-md-5 my-3">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="author">
                                            <h5 class="title mx-3 text-center"><b>Mascotas</b></h5>
                                            </a>
                                            <p class="description">
                                                @foreach ($mascotas as $mascota)
                                                    <tr>
                                                        <td> <b>Nombre: </b> {{ $mascota->nombre }} <br> </td>
                                                        <td> <b>Edad: </b>{{ $mascota->edad }}
                                                            {{ $mascota->selectorEdad }} <br> </td>
                                                        <td>
                                                            <a href="{{ route('mascotas.show', $mascota->id) }}"
                                                                class="btn btn-info">Detalles</a>
                                                            <a href="{{ route('mascotas.edit', $mascota->id) }}"
                                                                class="btn btn-warning">Editar</a> <br><br>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </p>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--end card user 2-->

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <a href="{{ route('clientes.index') }}" class="btn btn-primary mt-3">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
