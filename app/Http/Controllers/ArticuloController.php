<?php

namespace App\Http\Controllers;

use App\Http\Requests\Articulo\StoreRequest;
use App\Http\Requests\Articulo\UpdateRequest;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\PDF as PDF;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::get();
        $categorias = new Categoria();
        $proveedors = new Proveedor();

        return view('admin.articulo.index', compact('articulos'));
    }
    public function create()
    {
        $categorias = Categoria::get();
        $proveedors = Proveedor::get();
        return view('admin.articulo.create', compact('categorias', 'proveedors'));
    }
    public function store(StoreRequest $request)
    {
        $datosArticulo = request()->except('_token');
        if ($request->hasFile('imagen')) {
            $datosArticulo['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        $articulo = Articulo::create($datosArticulo);

        if ($request->codigo == "") {
            $numero = $articulo->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $articulo->update(['codigo' => $numeroConCeros]);
        }
        return redirect()->route('articulos.index');
    }
    public function show(Articulo $articulo)
    {
        return view('admin.articulo.show', compact('articulo'));
    }
    public function edit(Articulo $articulo)
    {
        $categorias = Categoria::get();
        $proveedors = Proveedor::get();
        return view('admin.articulo.edit', compact('articulo', 'categorias','proveedors'));
    }
    public function update(UpdateRequest $request, $id)
    {
        $datosArticulo = request()->except(['_token', '_method']);

        if ($request->hasFile('imagen')) {
            $articulo = Articulo::findOrFail($id);
            Storage::delete('public/' . $articulo->imagen);
            $datosArticulo['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Articulo::where('id', '=', $id)->update($datosArticulo);
        $articulo = Articulo::findOrFail($id);
        if ($request->codigo == "") {
            $numero = $articulo->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $articulo->update(['codigo' => $numeroConCeros]);
        }

        return redirect()->route('articulos.index');
    }
    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);
        if (Storage::delete('public/' . $articulo->imagen)) {
            Articulo::destroy($id);
        }
        return redirect()->route('articulos.index');
    }

    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $articulos = Articulo::where('codigo', $request->codigo)->firstOrFail();
            return response()->json($articulos);
        }
    }
    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $articulos = Articulo::findOrFail($request->articulo_id);
            return response()->json($articulos);
        }
    }

    
    public function print_barcode()
    {
        $articulos = Articulo::get();
        $pdf = PDF::loadView('admin.articulo.barcode', compact('articulos'));
        return $pdf->download('codigos_de_barras.pdf');
    }
}
