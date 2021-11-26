<?php

namespace App\Http\Controllers;

use App\Http\Requests\Compra\StoreRequest;

use App\Models\Articulo;
use App\Models\Compra;
use App\Models\Proveedor;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CompraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:compras.create')->only(['create','store']);
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
        $articulos= Articulo::where('estado','ACTIVO')->get();
        return view('admin.compra.create', compact('proveedors','articulos'));
    }
    public function store(StoreRequest $request)
    {
        $this->validate($request, [
            'total' => 'required',
        ]);

        $compra = Compra::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'fecha_compra'=>Carbon::now('America/La_Paz'),
        ]);
        foreach ($request->articulo_id as $key => $articulo) {
            $results[] = array("articulo_id"=>$request->articulo_id[$key], "cantidad"=>$request->cantidad[$key], "precio_compra"=>$request->precio_compra[$key]);
        }
        $compra->detallecompras()->createMany($results);
        return redirect()->route('admin.compras.index');
        
    }
    public function show(Compra $compra)
    {
        $subtotal = 0 ;
        $detallecompras = $compra->detallecompras;
        foreach ($detallecompras as $detallecompra) {
            $subtotal += $detallecompra->cantidad * $detallecompra->precio_compra;
        }
        
        return view('admin.compra.show', compact('compra', 'detallecompras', 'subtotal'));
    }
    public function pdf(Compra $compra)
    {
        $subtotal = 0 ;
        $detallecompras = $compra->detallecompras;
        foreach ($detallecompras as $detallecompra) {
            $subtotal += $detallecompra->cantidad * $detallecompra->precio_compra;
        }
        $fecha = Carbon::now('America/La_Paz');
        $pdf = PDF::loadView('admin.compra.pdf', compact('compra','fecha', 'subtotal', 'detallecompras'));        
        return $pdf->download('Reporte_de_compra_'.$compra->id.'.pdf');
        
    }

    // public function upload(Request $request, Compra $compra)
    // {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    // }

    public function cambio_de_estado(Compra $compra)
    {
        if ($compra->estado == 'VALIDO') {
            $compra->update(['estado'=>'CANCELADO']);
            return redirect()->back();
        } else {
            $compra->update(['estado'=>'VALIDO']);
            return redirect()->back();
        } 
    }
}
