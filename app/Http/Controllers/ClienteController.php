<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cliente\StoreRequest;
use App\Http\Requests\Cliente\UpdateRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
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
        return redirect()->route('clientes.index')->with('success', 'Se registró correctamente');
    }
    public function show(Cliente $cliente)
    {
        
    }
    public function edit(Cliente $cliente)
    {
        return view('admin.cliente.edit', compact('cliente'));
    }
    public function update(UpdateRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('update', 'Se editó el correctamente');
    }
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('delete', 'ok');
    }
}
