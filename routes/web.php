<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HorarioController;


Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::resource('mascotas', MascotaController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('horarios', HorarioController::class);
Route::resource('citas', CitaController::class);
// Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');
// Route::get('/citas/create', [CitaController::class, 'create'])->name ('citas.create');
// Route::post('/citas/store', [CitaController::class, 'store'])->name('citas.store');
// Route::get('/citas/{id}', [CitaController::class, 'show'])->name('citas.show');
// Route::put('/citas/update/{id}', [CitaController::class, 'update'])->name('citas.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/panel', [App\Http\Controllers\PanelController::class, 'index'])->name('panel');
