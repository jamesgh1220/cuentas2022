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
        return view('cuota.index', [
            'prestamo' => $prestamo,
            'valor' => $valor
        ]);
    }
}
