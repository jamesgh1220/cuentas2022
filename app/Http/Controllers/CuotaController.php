<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use App\Models\Prestamo;

use Illuminate\Http\Request;

class CuotaController extends Controller
{
    public function index($id) {
        $prestamo = Prestamo::find($id);
        $valor = $prestamo->valor;
        $cuotas = Cuota::where('prestamo_id', '=', $prestamo->id)->get();
        $abonado = Cuota::where('prestamo_id', '=', $prestamo->id)->sum('valor');
        return view('cuota.index', [
            'prestamo' => $prestamo,
            'valor' => $valor,
            'abonado' => (int)$abonado,
            'cuotas' => $cuotas
        ]);
    }

    public function guardarCuota(Request $request) {
        $validate = $this->validate($request, [
            'descripcion' => 'string|required',
            'valor' => 'integer|required',
        ]);

        $cuota = new Cuota();
        $cuota->prestamo_id = (int)$request->prestamo_id;
        $cuota->descripcion = $request->descripcion;
        $cuota->valor = (int)$request->valor;
        $cuota->save();
        $ruta = 'configurarCuota/'.$cuota->prestamo_id;
        

        return redirect($ruta)->with([
            'message' => 'El registro ha sido creado correctamente.'
        ]);
    }

    public function editar($id) {
        $cuota = Cuota::find($id);
        $valorCuota = $cuota->valor;
        $prestamo = Prestamo::find($cuota->prestamo_id);
        $valor = $prestamo->valor;
        $cuotas = Cuota::where('prestamo_id', '=', $prestamo->id)->get();
        $abonado = Cuota::where('prestamo_id', '=', $prestamo->id)->sum('valor');
        return view('cuota.editar', [
            'prestamo' => $prestamo,
            'valor' => $valor,
            'abonado' => (int)$abonado,
            'cuotas' => $cuotas,
            'cuota' => $cuota,
            'valorCuota' => $valorCuota
        ]);
    }

    public function actualizar(Request $request) {
        $validate = $this->validate($request, [
            'descripcion' => 'string|required',
            'valor' => 'integer|required',
        ]);

        $cuotaEditar = Cuota::find($request->cuota_id);
        $cuotaEditar->descripcion = $request->descripcion;
        $cuotaEditar->valor = $request->valor;
        $cuotaEditar->update();
        $ruta = 'configurarCuota/'.$cuotaEditar->prestamo_id;

        return redirect($ruta)->with([
            'message' => 'El registro ha sido creado correctamente.'
        ]);
    }
}
