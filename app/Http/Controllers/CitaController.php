<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Cita;
use App\Models\CitaServicio;
use App\Models\Mascota;
use App\Models\Servicio;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::orderBy('fechaCita', 'asc')
            ->orderBy('horaCita', 'asc')
            ->get();

        $cantidad = DB::table('citas')
            ->select()->count('*');
        return view('citas.index', compact('citas', 'cantidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mascotas = Mascota::orderBy('nombre', 'asc')->get();

        $cantidad = DB::table('horarios')
            ->select()->count('*');

        $cantidadMascotas = DB::table('mascotas')
            ->select()->count('*');

        $cantidadServicios = DB::table('servicios')
            ->select()->count('*');

        $servicios = Servicio::orderBy('id', 'asc')->get();

        $fechas = DB::select('SELECT DISTINCT fecha FROM horarios WHERE disponibilidad = "si"');
        $horas = DB::select('SELECT * FROM horarios WHERE disponibilidad = "si"');

        return view('citas.insert', compact('servicios', 'mascotas', 'fechas', 'horas', 'cantidad', 'cantidadMascotas', 'cantidadServicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fechaCita' => ['required'],
            'horaCita' => ['required'],
            'descripcion' => ['required', 'max:200'],
            'mascotaId' => ['required']
        ]);

        $cita = Cita::create($request->all());

        $id = $cita->id;
        $fecha = $cita->fechaCita;
        $hora = $cita->horaCita;

        $turnos = DB::table('horarios')
        ->select('turno')
        ->where('id','=',$id)
        ->get();

        foreach ($turnos as $turno) {
            echo $turno->turno;
        }

        DB::table('horarios')
            ->where('fecha', $fecha)
            ->where('hora', $hora)
            ->update(['cita_id' => $id]);

        DB::table('horarios')
            ->where('cita_id', $id)
            ->update(['disponibilidad' => 'no']);
        $servicios = $request->servicios;

        foreach ($servicios as $servicio) {
            $citaServicio = new CitaServicio();
            $citaServicio->cita_id = $id;
            $citaServicio->servicio_id = $servicio;
            $citaServicio->save();
        }

        return redirect()->route('citas.index')->with('exito', 'Se ha solicitado la cita exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Cita::join('mascotas', 'citas.mascotaId', '=', 'mascotas.id')
            ->join('clientes', 'mascotas.clienteId', '=', 'clientes.id')
            ->select('mascotas.*', 'citas.id as idCita', 'citas.fechaCita', 'citas.horaCita', 'citas.descripcion', 'citas.mascotaId', 'clientes.nombre as nombreResponsable', 'clientes.apellido', 'clientes.telefono', 'clientes.email', 'clientes.direccion')
            ->where('citas.id', '=', $id)
            ->first();

        $servicios = CitaServicio::join('servicios', 'cita_servicios.servicio_id', '=', 'servicios.id')
            ->select('servicios.*', 'cita_servicios.*')
            ->where('cita_servicios.cita_id', '=', $id)
            ->get();
        return view('citas.view', compact('mascota', 'servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::FindOrFail($id);

        $citaServicio = DB::table('cita_servicios')
            ->select('cita_id')
            ->where('cita_id', '=', $id);

        $citaServicio->delete();
        $cita->delete();


        return redirect()->route('citas.index')->with('exito', 'Se ha solicitado la cancelacion de la cita');
    }
}
