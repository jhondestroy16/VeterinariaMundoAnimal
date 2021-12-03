@extends('layouts.layout')

@section('titulo', 'Mascota')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Mascota</div>
                            <p class="card-category">Vista detallada de <b>{{ $mascota->nombre }} </b>
                            </p>
                        </div>
                        <!--body-->
                        <div class="card-body">
                            @if (session('exito'))
                                <div class="alert alert-success" role="success">
                                    {{ session('exito') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6 my-3">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="author">
                                                <h5 class="title mt-3"><strong>{{ $mascota->nombre }} </strong></h5>
                                                <p class="description">
                                                    <b>Especie: </b> {{ $mascota->especie }} <br>
                                                    <b>Raza: </b> {{ $mascota->raza }} <br>
                                                    <b>edad: </b> {{ $mascota->edad }} {{ $mascota->selectorEdad }} <br>
                                                    {{-- <b>Responsable: </b> {{ $mascota->nombreResponsable }}
                                                    {{ $mascota->apellido }} <br> --}}
                                                    <b>Fecha registro: </b> {{ $mascota->created_at }} <br>
                                                    <b>Ultima modificacion: </b> {{ $mascota->updated_at }}
                                                </p>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 my-3">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="author">
                                                <h5 class="title mt-3"><strong>{{ $cliente->nombre }}
                                                        {{ $cliente->apellido }} </strong></h5>
                                                <p class="description">
                                                    <b>Email: </b> {{ $cliente->email }} <br>
                                                    <b>Direccion: </b> {{ $cliente->direccion }} <br>
                                                    <b>Telefono: </b> {{ $cliente->telefono }} <br>
                                                    <b>Fecha registro: </b> {{ $cliente->created_at }} <br>
                                                    <b>Ultima modificacion: </b> {{ $cliente->updated_at }}
                                                </p>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="button-container">
                            <a href="{{ route('mascotas.index') }}" class="btn btn-primary mt-3">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
