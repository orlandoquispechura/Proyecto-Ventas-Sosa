<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categoria\StoreRequest;
use App\Http\Requests\Categoria\UpdateRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias= Categoria::get();
        return view('admin.categoria.index', compact('categorias'));
    }
    public function create()
    {
        return view('admin.categoria.create');
    }
    public function store(StoreRequest $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Se registró correctamente');
    }
    public function show(Categoria $categoria)
    {
        return view('admin.categoria.show', compact('categoria'));
    }
    public function edit(Categoria $categoria)
    {
        return view('admin.categoria.edit', compact('categoria'));
    }
    public function update(UpdateRequest $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('update', 'Se editó el correctamente');
    }
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('delete', 'ok');
    }
}
