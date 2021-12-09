@extends('layouts.layout')

@section('titulo', 'Citas')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Cita</div>
                        <p class="card-category">Vista detallada de la cita de <b>{{ $mascota->nombre }}</b> </b>
                        </p>
                    </div>
                    <!--body-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 my-3">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="author">
                                            <h5 class="title mt-3 text-center texto">Datos de la mascota</h5>
                                            <ul class="description text-center">
                                                <b>Nombre: </b> {{ $mascota->nombre }} <br>
                                                <b>Especie: </b> {{ $mascota->especie }} <br>
                                                <b>Raza: </b> {{ $mascota->raza }} <br>
                                                <b>Edad: </b> {{ $mascota->edad }} {{ $mascota->selectorEdad }} <br><br>
                                                <h5 class="texto">Datos del responsable</h5>
                                                <b>Nombre:</b> {{ $mascota->name }}<br>
                                                <b>Email:</b> {{ $mascota->email }}<br>
                                                <b>Telefono:</b> {{ $mascota->telefono }}<br>
                                                <b>Direccion:</b> {{ $mascota->direccion }}<br>
                                            </ul>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <!--end card user-->
                            <div class="col-md-7 my-3">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="author">
                                            <h5 class="title mx-3 text-center"><b>Servicios requeridos por:
                                                    {{ $mascota->nombre }}</b></h5>
                                            </a>
                                            <p class="description">
                                                @foreach ($servicios as $servicio)
                                                    <tr>
                                                        <td> <b>Nombre: </b> {{ $servicio->nombre }} <br> </td>
                                                        <td> <b>Descripcion: </b>{{ $servicio->descripcion }} <br> </td>
                                                        <td> <b>Valor:</b> $
                                                            {{ number_format($servicio->valor, 2, ',', '.') }} <br>
                                                        </td>
                                                        <td> <b>Duracion del servicio:</b>
                                                            @if ($servicio->duracion > '00:30:00')
                                                                Una hora
                                                            @else
                                                                Media hora
                                                            @endif <br><br>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <b>Fecha cita: </b> {{ $mascota->fechaCita }} <br>
                                                <b>Hora cita: </b> {{ $mascota->horaCita }} <br>
                                                <b>Hora cita fin: </b> {{ $mascota->horaCitaFin }} <br>
                                                <b>Valor de la cita: </b> $
                                                {{ number_format($mascota->valorTotal, 2, ',', '.') }} <br><br>
                                                <b>Nota:</b> El valor total puede cambiar porque algunos medicamentos no vienen incluidos en el servicio.
                                            </p>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--end card user 2-->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="button-container">
                            <a href="{{ route('citas.index') }}" class="btn btn-primary mt-3">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
