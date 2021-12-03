<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use App\Models\Mascota;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nombre', 'asc')->get();
        $cantidad = DB::table('clientes')
            ->select()->count('*');
        return view('clientes.index', compact('clientes','cantidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => ['required'],
            'email' => ['required', 'unique:clientes,email'],
            'direccion' => ['required'],
            'contrasenia' => ['required', 'min:8'],
            'telefono' => ['required', 'unique:clientes,telefono', 'min:7', 'max:10']
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('exito', 'Se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascotas = Mascota::join('clientes', 'mascotas.clienteId', '=', 'clientes.id')
            ->select('mascotas.*', 'clientes.nombre as nombreResponsable', 'clientes.apellido')
            ->where('clientes.id', '=', $id)
            ->get();
        $cliente = Cliente::FindOrFail($id);

        return view('clientes.view', compact('cliente', 'mascotas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::FindOrFail($id);
        //Enviar a la vista
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => ['required'],
            'email' => ['required'],
            'direccion' => ['required'],
            'telefono' => ['required', 'min:7', 'max:10']
        ]);

        $cliente = Cliente::FindOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('exito', 'Se ha modificado los datos exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::FindOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('exito', 'Se ha eliminado el cliente');
    }
}
