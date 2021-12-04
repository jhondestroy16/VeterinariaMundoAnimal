<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServicioRequest;
use App\Http\Requests\UpdateServicioRequest;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:servicios')->only('create','edit');
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $servicios = Servicio::orderBy('nombre', 'asc')->get();
        $cantidad = DB::table('servicios')
            ->select()->count('*');
        //
        return view('servicios.index', compact('servicios', 'cantidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios.insert');
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
            'nombre' => ['required'],
            'descripcion' => ['required'],
            'valor' => ['required'],
            'duracion' => ['required']
        ]);

        $servicio = Servicio::create($request->all());

        $duracion = $servicio->duracion;
        $id = $servicio->id;

        if ($duracion <= "00:30:00") {
            DB::table('servicios')
                ->where('id', $id)
                ->update(['turno' => 1]);
        } else {
            DB::table('servicios')
                ->where('id', $id)
                ->update(['turno' => 2]);
        }
        return redirect()->route('servicios.index')->with('exito', 'Se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $servicio = Servicio::FindOrFail($id);

        return view('servicios.view', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $servicio = Servicio::FindOrFail($id);
        //Enviar a la vista
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'valor' => 'required',
            'duracion' => 'required'
        ]);

        $servicios = Servicio::FindOrFail($id);
        $servicios->update($request->all());

        return redirect()->route('servicios.index')->with('exito', 'Se ha modificado los datos exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $servicios = Servicio::FindOrFail($id);
        $servicios->delete();
        return redirect()->route('servicios.index')->with('exito', 'Se ha eliminado el servicio');
    }
}
