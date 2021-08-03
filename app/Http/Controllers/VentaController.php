<?php

namespace App\Http\Controllers;

use App\Http\Requests\Venta\StoreRequest;
use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use PDF;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::get();
        return view('admin.venta.index', compact('ventas'));
    }
    public function create()
    {
        $ventas = Venta::get();
        $clientes = Cliente::get();
        $articulos = Articulo::get();
        return view('admin.venta.create', compact('ventas', 'clientes', 'articulos'));
    }
    public function store(StoreRequest $request)
    {
        $venta = Venta::create($request->all() + [
            'user_id' => Auth::user()->id,
            'fecha_venta' => Carbon::now('America/La_Paz'),
        ]);
        foreach ($request->articulo_id as $key => $articulo) {
            $results[] = array("articulo_id" => $request->articulo_id[$key], "cantidad" => $request->cantidad[$key], "precio_venta" => $request->precio_venta[$key], "descuento" => $request->descuento[$key]);
        }
        $venta->detalleventas()->createMany($results);
        return redirect()->route('ventas.index');
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
    public function edit(Venta $venta)
    {
        //
    }
    public function update(Request $request, Venta $venta)
    {
        //
    }
    public function destroy(Venta $venta)
    {
        //
    }
    /*public function pdf(Venta $venta)
    {
        $subtotal = 0 ;
        $detalleventas = $venta->detalleventas;
        foreach ($detalleventas as $detalleventa) {
            $subtotal += $detalleventa->cantidad*$detalleventa->precio_venta-$detalleventa->cantidad* $detalleventas->precio_venta*$detalleventas->descuento/100;
        }
        $pdf = PDF::loadView('admin.venta.pdf', compact('venta', 'subtotal', 'detalleventas'));
        return $pdf->download('Reporte_de_venta_'.$venta->id.'.pdf');
    }*/

    /*public function print(Sale $sale){
        try {
            $subtotal = 0 ;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
            }  

            $printer_name = "TM20";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            $printer->text("€ 9,95\n");

            $printer->cut();
            $printer->close();


            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }*/

    public function cambio_de_estado(Venta $venta)
    {
        if ($venta->estado == 'VALIDO') {
            $venta->update(['estado' => 'CANCELADO']);
            return redirect()->back();
        } else {
            $venta->update(['estado' => 'VALIDO']);
            return redirect()->back();
        }
    }
}
