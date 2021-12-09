<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:horarios');
    }
    public function index()
    {
        $horarios = Horario::orderBy('turno', 'asc')
            ->get();
        $cantidad = DB::table('horarios')
            ->select()->count('*');

        return view('horarios.index', compact('horarios', 'cantidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horarios.insert');
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
            'fecha' => ['required'],
            'hora' => ['required']
        ]);

        $horario = Horario::create($request->all());

        $duracion = $horario->hora;
        $id = $horario->id;

        if ($duracion <= "08:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 1]);
        } else if ($duracion <= "08:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 2]);
        } else if ($duracion <= "09:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 3]);
        } else if ($duracion <= "09:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 4]);
        } else if ($duracion <= "10:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 5]);
        } else if ($duracion <= "10:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 6]);
        } else if ($duracion <= "11:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 7]);
        } else if ($duracion <= "11:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 8]);
        } else if ($duracion <= "14:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 9]);
        } else if ($duracion <= "14:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 10]);
        } else if ($duracion <= "15:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 11]);
        } else if ($duracion <= "15:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 12]);
        } else if ($duracion <= "16:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 13]);
        } else if ($duracion <= "16:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 14]);
        } else if ($duracion <= "17:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 15]);
        } else if ($duracion <= "17:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 16]);
        }
        return redirect()->route('horarios.index')->with('exito', 'Se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horario = Horario::FindOrFail($id);
        return view('horarios.view', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horario = Horario::FindOrFail($id);
        return view('horarios.edit', compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => ['required'],
            'hora' => ['required'],
            'disponibilidad' => ['required']
        ]);

        $horario = Horario::FindOrFail($id);
        $horario->update($request->all());

        $duracion = $horario->hora;
        $id = $horario->id;

        if ($duracion <= "08:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 1]);
        } else if ($duracion <= "08:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 2]);
        } else if ($duracion <= "09:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 3]);
        } else if ($duracion <= "09:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 4]);
        } else if ($duracion <= "10:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 5]);
        } else if ($duracion <= "10:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 6]);
        } else if ($duracion <= "11:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 7]);
        } else if ($duracion <= "11:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 8]);
        } else if ($duracion <= "14:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 9]);
        } else if ($duracion <= "14:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 10]);
        } else if ($duracion <= "15:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 11]);
        } else if ($duracion <= "15:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 12]);
        } else if ($duracion <= "16:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 13]);
        } else if ($duracion <= "16:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 14]);
        } else if ($duracion <= "17:00:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 15]);
        } else if ($duracion <= "17:30:00") {
            DB::table('horarios')
                ->where('id', $id)
                ->update(['turno' => 16]);
        }

        return redirect()->route('horarios.index')->with('exito', 'Se ha modificado los datos exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario = Horario::FindOrFail($id);
        $horario->delete();
        return redirect()->route('horarios.index')->with('exito', 'Se ha eliminado el horario exitosamente');
    }
}
