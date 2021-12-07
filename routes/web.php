<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HorarioController;


Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Route::resource('clientes', ClienteController::class);
Route::resource('mascotas', MascotaController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('citas', CitaController::class)->only(['index', 'create', 'store', 'show', 'destroy']);
Route::resource('horarios', HorarioController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/panel', [App\Http\Controllers\PanelController::class, 'index'])->name('panel');
