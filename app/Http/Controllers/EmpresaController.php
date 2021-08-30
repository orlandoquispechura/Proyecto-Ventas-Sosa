<?php

namespace App\Http\Controllers;

use App\Http\Requests\Empresa\UpdateRequest;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa = Empresa::where('id', 1)->firstOrFail();
        return view('admin.empresa.index', compact('empresa'));
    }
    // public function update(UpdateRequest $request, $id)
    // {
    //     $datosArticulo = request()->except(['_token', '_method']);
    //     if ($request->hasFile('imagen')) {
    //         $articulo = Articulo::findOrFail($id);
    //         Storage::delete('public/' . $articulo->imagen);
    //         $datosArticulo['imagen'] = $request->file('imagen')->store('uploads', 'public');
    //     }
    // Articulo::where('id', '=', $id)->update($datosArticulo);
    // $articulo = Articulo::findOrFail($id);
    // if ($request->codigo == "") {
    //     $numero = $articulo->id;
    //     $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
    //     $articulo->update(['codigo' => $numeroConCeros]);
    // }

    //     return redirect()->route('articulos.index');
    // }
    public function update(UpdateRequest $request, Empresa $empresa)
    {
      $empre = $request->all();
      if ($logo = $request->file('logo')) {
        $rutaGuardarLogo = 'imagen/';
        $logoEmpresa =date('YmdHis').".". $logo->getClientOriginalExtension();
        $logo->move($rutaGuardarLogo, $logoEmpresa);
        $empre['logo'] = "$logoEmpresa";
    }else {
        unset($empre['logo']);
    }
      $empresa->update($empre);      
      return redirect()->route('empresa.index')->with('update', 'Se editó correctamente');
    }
}
