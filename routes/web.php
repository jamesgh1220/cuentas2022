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

Route::get('/prestamo', [PrestamoController::class, 'index'])->name('prestamo.index');
Route::post('/prestamoCrear', [PrestamoController::class, 'guardarPrestamo'])->name('prestamo.guardar');
Route::get('/prestamos', [PrestamoController::class, 'prestamos'])->name('prestamo.prestamo');
Route::get('/deudas', [PrestamoController::class, 'deudas'])->name('prestamo.deuda');
Route::get('/editar/{id}', [PrestamoController::class, 'editar'])->name('prestamo.editar');
Route::post('/actualizar', [PrestamoController::class, 'actualizar'])->name('prestamo.actualizar');
Route::get('/agregarCuota/{id}', [CuotaController::class, 'index'])->name('cuota.index');
Route::post('/agregarCuota', [CuotaController::class, 'guardarCuota'])->name('cuota.guardar');
