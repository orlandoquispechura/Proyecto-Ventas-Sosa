<?php

namespace App\Http\Controllers;

use App\Http\Requests\Empresa\UpdateRequest;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{

  public function __construct()
  {
    $this->middleware('permission:home');
    $this->middleware('permission:empresas.index|empresas.edit',['only'=>['index']]);
    $this->middleware('permission:empresas.edit',['only'=>['edit','update']]);

  }

    public function index()
    {
        $empresa = Empresa::where('id', 1)->firstOrFail();
        return view('admin.empresa.index', compact('empresa'));
    }
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
