<?php

namespace App\Http\Controllers;

use App\Http\Requests\Compra\StoreRequest;

use App\Models\Articulo;
use App\Models\Compra;
use App\Models\Proveedor;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:compras.create')->only(['create', 'store']);
        $this->middleware('can:compras.index')->only(['index']);
        $this->middleware('can:compras.show')->only(['show']);

        $this->middleware('can:cambio.estado.compras')->only(['cambio_de_estado']);
        $this->middleware('can:compras.pdf')->only(['pdf']);
    }


    public function index()
    {
        $compras = Compra::get();
        return view('admin.compra.index', compact('compras'));
    }
    public function create()
    {
        $proveedors = Proveedor::get();
        $articulos = Articulo::where('estado', 'ACTIVO')->get();
        return view('admin.compra.create', compact('proveedors', 'articulos'));
    }
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $compra = Compra::create($request->all() + [
                'user_id' => Auth::user()->id,
                'fecha_compra' => Carbon::now('America/La_Paz'),
            ]);
            foreach ($request->articulo_id as $key => $articulo) {
                $results[] = array("articulo_id" => $request->articulo_id[$key], "cantidad" => $request->cantidad[$key], "precio_compra" => $request->precio_compra[$key]);
            }
            $compra->detallecompras()->createMany($results);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.compras.index')->with('error', 'No se registro la compra, verifique los datos antes de registrar la compra');
        }
        return redirect()->route('admin.compras.index')->with('success', 'Se registró la compra');
    }
    public function show(Compra $compra)
    {
        $subtotal = 0;
        $detallecompras = $compra->detallecompras;
        foreach ($detallecompras as $detallecompra) {
            $subtotal += $detallecompra->cantidad * $detallecompra->precio_compra;
        }

        return view('admin.compra.show', compact('compra', 'detallecompras', 'subtotal'));
    }
    public function pdf(Compra $compra)
    {
        $subtotal = 0;
        $detallecompras = $compra->detallecompras;
        foreach ($detallecompras as $detallecompra) {
            $subtotal += $detallecompra->cantidad * $detallecompra->precio_compra;
        }
        $fecha = Carbon::now('America/La_Paz');
        $pdf = PDF::loadView('admin.compra.pdf', compact('compra', 'fecha', 'subtotal', 'detallecompras'));
        return $pdf->stream('Reporte_de_compra.pdf');

    }
    public function cambio_de_estado($id)
    {
        $ingreso = Compra::findOrFail($id);
        $ingreso->estado = 'CANCELADO';
        $ingreso->update();
        return redirect()->back()->with('cancelado', 'Compra Cancelada');
    }
}
