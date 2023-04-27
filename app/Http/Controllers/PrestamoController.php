<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;

use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index() {
        // $prestamos = Prestamo::all();
        // $ahorros = Prestamo::join('cuota', 'prestamo.id', 'cuota.prestamo_id')->get();
        // return view('prestamo.index', [
        //     'prestamos' => $prestamos
        // ]);
    }

    public function prestamos() {
        $prestamos = Prestamo::where('tipo_prestamo', 0)->get();
        return view('prestamo.index', [
            'prestamos' => $prestamos
        ]);
    }

    public function ahorros() {
        $prestamos = Prestamo::where('tipo_prestamo', 1)->get();
        return view('ahorros.index', [
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

    public function editar($id) {
        $prestamos = Prestamo::all();
        $prestamo = Prestamo::find($id);
        return view('prestamo.editar', [
            'prestamo' => $prestamo,
            'prestamos' => $prestamos
        ]);
    }

    public function actualizar(Request $request) {
        $validate = $this->validate($request, [
            'tipo_prestamo' => 'integer|required',
            'nombre' => 'string|required',
            'descripcion' => 'string|required',
            'valor' => 'integer|required'
        ]);

        $prestamoEditar = Prestamo::find($request->prestamo_id);
        $prestamoEditar->tipo_prestamo = (int)$request->tipo_prestamo;
        $prestamoEditar->nombre = $request->nombre;
        $prestamoEditar->descripcion = $request->descripcion;
        $prestamoEditar->valor = $request->valor;

        $prestamoEditar->update();
        return redirect()->route('prestamo.index')->with([
            'message' => 'El registro ha sido actualizado correctamente.'
        ]);
    }
}
