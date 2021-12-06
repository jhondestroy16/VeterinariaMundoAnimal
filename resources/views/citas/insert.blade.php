@extends('layouts.layout')

@section('titulo', 'Solicitar cita')

@section('content')
    <h1 class="texto-blanco pt-5 pb-3">Solicitar cita</h1>
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
    <form action="{{ route('citas.store') }}" method="post" class="my-3">
        @method('POST')
        @csrf
        <div class="card mt-4 mb-3">
            <div class="card-body shadow">
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="mascotaId" class="form-label texto my-2">
                                <h4 class="texto">Mascota</h4>
                            </label>
                            <select name="mascotaId" class="form-control">
                                <option selected disabled value="">Seleccione...</option>
                                @if ($cantidadMascotas > 0)
                                    @foreach ($mascotas as $mascota)
                                        <option value="{{ $mascota->id }}"> {{ $mascota->nombre }}</option>
                                    @endforeach
                                @else
                                    <option disabled value>No hay mascotas registradas.</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <div class="content-input">
                                <h4 class="texto">Servicios</h4>
                                @if ($cantidadServicios > 0)
                                    @foreach ($servicios as $servicio)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="{{ $servicio->id }}"
                                                id="flexCheckDefault" name="servicios[]">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $servicio->nombre }} -
                                                {{ number_format($servicio->valor, 2, ',', '.') }}
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No hay servicios disponibles.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="date" class="form-label">
                                <h4 class="texto">Fecha de la cita:</h4>
                            </label>
                            <select name="fechaCita" class="form-control">
                                <option selected disabled value="">Seleccione...</option>
                                @if ($cantidad > 0)
                                    @foreach ($fechas as $fecha)
                                        <option value="{{ $fecha->fecha }}">
                                            {{ $fecha->fecha }}
                                        </option>
                                    @endforeach
                                @else
                                    <option disabled value>No hay fechas registradas.</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="time" class="form-label">
                                <h4 class="texto">Hora de la cita:</h4>
                            </label>
                            <select name="horaCita" class="form-control">
                                <option selected disabled value="">Seleccione...</option>
                                @if ($cantidad > 0)
                                    @foreach ($horas as $hora)
                                        <option value="{{ $hora->hora }}">
                                            {{ $hora->hora }}
                                        </option>
                                    @endforeach
                                @else
                                    <option disabled value>No hay fechas registradas.</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="exampleFormControlTextarea1" class="form-label description">
                                <h4 class="texto">Descripcion:</h4>
                            </label>
                            <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mb-4" onclick="return confirm('¿Desea agendar la cita?')">
                Solicitar cita
            </button>
        </div>
    </form>
@endsection
