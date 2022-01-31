<?php

namespace App\Http\Controllers;

use App\Http\Requests\Venta\StoreRequest;
use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:ventas.create')->only(['create', 'store']);
        $this->middleware('can:ventas.index')->only(['index']);
        $this->middleware('can:ventas.show')->only(['show']);
        $this->middleware('can:cambio.estado.ventas')->only(['cambio_de_estado']);
        $this->middleware('can:ventas.pdf')->only(['pdf']);
    }

    public function index()
    {
        $ventas = Venta::get();
        $detalleventas = DetalleVenta::get();
        return view('admin.venta.index', compact('ventas', 'detalleventas'));
    }
    public function create()
    {
        $clientes = Cliente::get();
        $articulos = Articulo::where('estado', 'ACTIVO')->get();
        $venta = Venta::get();
        return view('admin.venta.create', compact('clientes', 'articulos', 'venta'));
    }
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $venta = Venta::create($request->all() + [
                'user_id' => Auth::user()->id,
                'fecha_venta' => Carbon::now('America/La_Paz'),
            ]);
            foreach ($request->articulo_id as $key => $articulo) {
                $results[] = array("articulo_id" => $request->articulo_id[$key], "cantidad" => $request->cantidad[$key], "precio_venta" => $request->precio_venta[$key], "descuento" => $request->descuento[$key]);
            }
            $venta->detalleventas()->createMany($results);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.ventas.index')->with('error', 'No se registro la venta, verifique los datos antes de registrar la venta');
        }
        return redirect()->route('admin.ventas.index')->with('success', 'Se registró la venta');
    }
    public function show(Venta $venta)
    {
        $subtotal = 0;
        $detalleventas = $venta->detalleventas;
        foreach ($detalleventas as $detalleventa) {
            $subtotal += $detalleventa->cantidad * $detalleventa->precio_venta - $detalleventa->cantidad * $detalleventa->precio_venta * $detalleventa->descuento / 100;
        }

        return view('admin.venta.show', compact('venta', 'detalleventas', 'subtotal'));
    }

    public function pdf(Venta $venta)
    {
        $subtotal = 0;
        $detalleventas = $venta->detalleventas;
        foreach ($detalleventas as $detalleventa) {
            $subtotal += $detalleventa->cantidad * $detalleventa->precio_venta - $detalleventa->cantidad * $detalleventa->precio_venta * $detalleventa->descuento / 100;
        }
        $pdf = PDF::loadView('admin.venta.pdf', compact('venta', 'subtotal', 'detalleventas'));
        return $pdf->stream('Reporte_de_venta.pdf');
    }

    public function cambio_de_estado($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->estado = 'CANCELADO';
        $venta->update();
        return redirect()->back()->with('cancelado', 'Venta Cancelada');
    }
}
