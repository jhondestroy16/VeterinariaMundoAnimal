<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Cita;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = Mascota::orderBy('nombre', 'asc')->get();
        $citas = Cita::orderBy('id', 'asc')->get();
        $cantidad = DB::table('mascotas')
            ->select()->count('*');
        return view('mascotas.index', compact('mascotas', 'citas', 'cantidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = Cliente::orderBy('nombre', 'asc')->get();

        return view('mascotas.insert', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Se requieren todos los datos, ninguno puede ser nulo.
        $request->validate([
            'nombre' => ['required', 'max:50'],
            'especie' => ['required'],
            'raza' => ['required'],
            'selectorEdad' => ['required'],
            'edad' => ['required'],
            'clienteId' => ['required']
        ]);
        Mascota::create($request->all());
        return redirect()->route('mascotas.index')->with('exito', 'Se ha agregado la mascota exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::join('mascotas', 'mascotas.clienteId', '=', 'clientes.id')
            ->select('mascotas.*', 'clientes.*')
            ->where('mascotas.id', '=', $id)
            ->first();
        $mascota = Mascota::join('clientes', 'mascotas.clienteId', '=', 'clientes.id')
            ->select('mascotas.*', 'clientes.nombre as nombreResponsable', 'clientes.apellido')
            ->where('mascotas.id', '=', $id)
            ->first();
        return view('mascotas.view', compact('mascota', 'cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $clientes = Cliente::orderBy('nombre', 'asc')->get();
        $mascota = Mascota::FindOrFail($id);
        return view('mascotas.edit', compact('clientes', 'mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'selectorEdad' => 'required',
            'edad' => 'required'
            // 'clienteId'=> 'required'
        ]);

        $mascota = Mascota::findOrFail($id);
        $mascota->update($request->all());
        return redirect()->route('mascotas.index')->with('exito', 'Se ha modificado los datos de la mascota exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mascota = Mascota::findOrFail($id);
        $mascota->delete();

        return redirect()->route('mascotas.index')->with('exito', 'Se ha eliminado la mascota correctamente.');
    }
}
