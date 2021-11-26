<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:reporte_dia')->only(['reporte_dia']);
        $this->middleware('can:reporte_fecha')->only(['reporte_fecha']);
    }
    public function reporte_dia(){
        $ventas = Venta::WhereDate('fecha_venta', Carbon::today('America/La_Paz'))->get();
        $total = $ventas->sum('total');
        return view('admin.reporte.reporte_dia', compact('ventas', 'total'));
    }
    public function reporte_fecha(){
        $ventas = Venta::whereDate('fecha_venta', Carbon::today('America/La_Paz'))->get();
        $total = $ventas->sum('total');
        return view('admin.reporte.reporte_fecha', compact('ventas', 'total'));
    }
    public function resultado_reporte(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $ventas = Venta::whereBetween('fecha_venta', [$fi, $ff])->get();
        $total = $ventas->sum('total');
        return view('admin.reporte.reporte_fecha', compact('ventas', 'total')); 
    }
}
