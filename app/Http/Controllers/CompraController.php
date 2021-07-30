<?php

namespace App\Http\Controllers;

use App\Http\Requests\Compra\StoreRequest;
use App\Http\Requests\Compra\UpdateRequest;

use App\Models\Articulo;
use App\Models\Compra;
use App\Models\Proveedor;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use Illuminate\Support\Carbon;
use Carbon\Carbon;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::get();
        return view('admin.compra.index', compact('compras'));
    }
    public function create()
    {
        $proveedors = Proveedor::get();
        $articulos= Articulo::get();
        return view('admin.compra.create', compact('proveedors','articulos'));
    }
    /*public function store(StoreRequest $request)
        {
            $purchase = Purchase::create($request->all()+[
                'user_id'=>Auth::user()->id,
                'purchase_date'=>Carbon::now('America/Lima'),
            ]);
            foreach ($request->product_id as $key => $product) {
                $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
            }
            $purchase->purchaseDetails()->createMany($results);
            return redirect()->route('purchases.index');
        }*/
    public function store(StoreRequest $request)
    {
        $compra = Compra::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'fecha_compra'=>Carbon::now('America/La_Paz'),
        ]);
        foreach ($request->articulo_id as $key => $articulo) {
            $results[] = array("articulo_id"=>$request->articulo_id[$key], "cantidad"=>$request->cantidad[$key], "precio_compra"=>$request->precio_compra[$key]);
        }
        $compra->detallecompras()->createMany($results);
        return redirect()->route('compras.index');
        
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
    public function edit(Compra $compra)
    {
        //
    }
    public function update(UpdateRequest $request, Compra $compra)
    {
        //
    }
    public function destroy(Compra $compra)
    {
        //
    }
    public function cambio_de_estado(Compra $compra)
    {
        if ($compra->estado == 'VALIDO') {
            $compra->update(['estado'=>'CANCELEDO']);
            return redirect()->back();
        } else {
            $compra->update(['estado'=>'VALIDO']);
            return redirect()->back();
        } 
    }
}