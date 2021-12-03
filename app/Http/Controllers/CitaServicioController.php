<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCitaServicioRequest;
use App\Http\Requests\UpdateCitaServicioRequest;
use App\Models\CitaServicio;

class CitaServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCitaServicioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCitaServicioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CitaServicio  $citaServicio
     * @return \Illuminate\Http\Response
     */
    public function show(CitaServicio $citaServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CitaServicio  $citaServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(CitaServicio $citaServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCitaServicioRequest  $request
     * @param  \App\Models\CitaServicio  $citaServicio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCitaServicioRequest $request, CitaServicio $citaServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CitaServicio  $citaServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(CitaServicio $citaServicio)
    {
        //
    }
}
