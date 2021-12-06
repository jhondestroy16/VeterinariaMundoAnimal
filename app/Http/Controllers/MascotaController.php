<?php

namespace App\Http\Controllers;


use App\Models\Mascota;
use App\Models\Cita;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:mascotas');
    }

    public function index()
    {
        $id = Auth::id();
        $mascotas = Mascota::all()
            ->where('clienteId', '=', $id);

        $cantidad = DB::table('mascotas')
            ->select()->count('*');
        return view('mascotas.index', compact('mascotas', 'cantidad'));
    }

    public function create()
    {
        return view('mascotas.insert');
    }

    public function store(Request $request)
    {
        //Se requieren todos los datos, ninguno puede ser nulo.
        $request->validate([
            'nombre' => ['required', 'max:50'],
            'especie' => ['required'],
            'raza' => ['required'],
            'selectorEdad' => ['required'],
            'edad' => ['required']
        ]);

        $mascota = Mascota::create($request->all());
        $id = $mascota->id;
        $idUser = Auth::id();

        DB::table('mascotas')
            ->where('id', $id)
            ->update(['clienteId' => $idUser]);

        return redirect()->route('mascotas.index')->with('exito', 'Se ha agregado la mascota exitosamente');
    }

    public function show($id)
    {
        $cliente = Mascota::join('users', 'mascotas.clienteId', '=', 'users.id')
            ->select('mascotas.*', 'users.*')
            ->where('mascotas.id', '=', $id)
            ->first();

        return view('mascotas.view', compact('cliente'));
    }

    public function edit($id)
    {
        $clientes = User::orderBy('name', 'asc')->get();
        $mascota = Mascota::FindOrFail($id);
        return view('mascotas.edit', compact('clientes', 'mascota'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'selectorEdad' => 'required',
            'edad' => 'required'
        ]);

        $mascota = Mascota::findOrFail($id);
        $mascota->update($request->all());
        return redirect()->route('mascotas.index')->with('exito', 'Se ha modificado los datos de la mascota exitosamente.');
    }

    public function destroy($id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->delete();

        return redirect()->route('mascotas.index')->with('exito', 'Se ha eliminado la mascota correctamente.');
    }
}
