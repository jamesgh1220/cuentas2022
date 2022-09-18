<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;

use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index() {
        $prestamos = Prestamo::all();
        return view('prestamo.index', [
            'prestamos' => $prestamos
        ]);
    }

    public function prestamos() {
        $prestamos = Prestamo::where('tipo_prestamo', 0)->get();
        return view('prestamo.prestamo', [
            'prestamos' => $prestamos
        ]);
    }

    public function deudas() {
        $prestamos = Prestamo::where('tipo_prestamo', 1)->get();
        return view('prestamo.deuda', [
            'prestamos' => $prestamos
        ]);
    }

    public function guardarPrestamo(Request $request) {
        $validate = $this->validate($request, [
            'tipo_prestamo' => 'integer|required',
            'nombre' => 'string|required',
            'descripcion' => 'string|required',
            'valor' => 'integer|required'
        ]);

        $prestamo = new Prestamo();
        $prestamo->tipo_prestamo = (int)$request->tipo_prestamo;
        $prestamo->nombre = $request->nombre;
        $prestamo->descripcion = $request->descripcion;
        $prestamo->valor = $request->valor;
        $prestamo->save();

        return redirect()->route('prestamo.index')->with([
            'message' => 'El registro ha sido creado correctamente.'
        ]);
    }
}
