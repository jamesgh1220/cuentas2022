<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\CuotaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prestamo', [PrestamoController::class, 'prestamos'])->name('prestamo.index');
Route::post('/prestamoCrear', [PrestamoController::class, 'guardarPrestamo'])->name('prestamo.guardar');
Route::get('/prestamos', [PrestamoController::class, 'prestamos'])->name('prestamo.prestamo');
Route::get('/deudas', [PrestamoController::class, 'deudas'])->name('prestamo.deuda');
Route::get('/editarPrestamo/{id}', [PrestamoController::class, 'editar'])->name('prestamo.editar');
Route::post('/actualizarPrestamo', [PrestamoController::class, 'actualizar'])->name('prestamo.actualizar');
Route::get('/configurarCuota/{id}', [CuotaController::class, 'index'])->name('cuota.index');
Route::post('/agregarCuota', [CuotaController::class, 'guardarCuota'])->name('cuota.guardar');
Route::get('/editarCuota/{id}', [CuotaController::class, 'editar'])->name('cuota.editar');
Route::post('/actualizarCuota', [CuotaController::class, 'actualizar'])->name('cuota.actualizar');
Route::get('/ahorro', [PrestamoController::class, 'ahorros'])->name('ahorro.index');