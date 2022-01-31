<?php

namespace App\Http\Controllers;

use App\Http\Requests\Proveedor\StoreRequest;
use App\Http\Requests\Proveedor\UpdateRequest;

use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:proveedors.create')->only(['create','store']);
        $this->middleware('can:proveedors.index')->only(['index']);
        $this->middleware('can:proveedors.edit')->only(['edit','update']);
        $this->middleware('can:proveedors.show')->only(['show']);
        $this->middleware('can:proveedors.destroy')->only(['destroy']);
    }

    public function index()
    {
        $proveedors = Proveedor::get();
        return view('admin.proveedor.index', compact('proveedors'));
    }
    public function create()
    {
        return view('admin.proveedor.create');
    }
    public function store(StoreRequest $request)
    {
        Proveedor::create($request->all());
        return redirect()->route('admin.proveedors.index')->with('success', 'Se registró correctamente');
    }
    public function show(Proveedor $proveedor)
    {
        return view('admin.proveedor.show', compact('proveedor'));
    }
    public function edit(Proveedor $proveedor)
    {
        return view('admin.proveedor.edit', compact('proveedor'));
    }
    public function update(UpdateRequest $request, Proveedor $proveedor)
    {
        $proveedor->update($request->all());
        return redirect()->route('admin.proveedors.index')->with('update', 'Se editó correctamente');
    }
    public function destroy(Proveedor $proveedor)
    {
        $item = $proveedor->compras()->count();
        if ($item > 0) {
            return redirect()->back()->with('error','El proveedor no puede eliminarse, tiene compras registradas.');
        }
        $proveedor->delete();
        return redirect()->route('admin.proveedors.index')->with('delete', 'ok');
    }
}
