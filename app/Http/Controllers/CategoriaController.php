<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categoria\StoreRequest;
use App\Http\Requests\Categoria\UpdateRequest;
use App\Models\Categoria;
use App\Http\Controllers\Str;

class CategoriaController extends Controller
{
    public function __construct()
    {        
        $this->middleware('auth');
        $this->middleware('can:categorias.create', ['only'=>['create','store']]);
        $this->middleware('can:categorias.index',['only'=>['index']]);
        $this->middleware('can:categorias.edit',['only'=>['edit','update']]);
        $this->middleware('can:categorias.destroy',['only'=>['destroy']]);
    }
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
        return redirect()->route('admin.categorias.index')->with('success', 'Se registró correctamente');
    }
    
    public function edit(Categoria $categoria)
    {
        return view('admin.categoria.edit', compact('categoria'));
    }
    public function update(UpdateRequest $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('admin.categorias.index')->with('update', 'Se editó correctamente');
    }
    public function destroy(Categoria $categoria)
    {
        $item = $categoria->articulos()->count();
        if ($item > 0) {
            return redirect()->back()->with('error','No se puede eliminar, hay artículos que corresponden a esta categoría.');
        }
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('delete', 'ok');
    }
}
