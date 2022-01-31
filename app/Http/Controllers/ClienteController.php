<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cliente\StoreRequest;
use App\Http\Requests\Cliente\UpdateRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:clientes.create')->only(['create','store']);
        $this->middleware('can:clientes.index')->only(['index']);
        $this->middleware('can:clientes.edit')->only(['edit','update']);
        $this->middleware('can:clientes.show')->only(['show']);
        $this->middleware('can:clientes.destroy')->only(['destroy']);
    }

    public function index()
    {        
        $clientes = Cliente::get();
        return view('admin.cliente.index', compact('clientes'));
    }
    public function create()
    {
        return view('admin.cliente.create');
    }
    public function store(StoreRequest $request)
    {
        Cliente::create($request->all());
        if ($request->venta == 1) {
            return redirect()->back();
        }

        return redirect()->route('admin.clientes.index')->with('success', 'Se registró correctamente');
    }
    public function show(Cliente $cliente)
    {
        $total_ventas = 0;
        foreach ($cliente->ventas as $key =>  $venta) {
            $total_ventas +=$venta->total;
        }
        return view('admin.cliente.show', compact('cliente', 'total_ventas'));
    }
    public function edit(Cliente $cliente)
    {
        return view('admin.cliente.edit', compact('cliente'));
    }
    public function update(UpdateRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('admin.clientes.index')->with('update', 'Se editó el correctamente');
    }
    public function destroy(Cliente $cliente)
    {
        $item = $cliente->ventas()->count();
        if ($item > 0) {
            return redirect()->back()->with('error','El cliente no puede eliminarse, tiene ventas realizadas.');
        }
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with('delete', 'ok');       
    }
}
