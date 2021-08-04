<?php

namespace App\Http\Controllers;

use App\Http\Requests\Empresa\UpdateRequest;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa = Empresa::where('id', 1)->firstOrFail();
        return view('admin.empresa.index', compact('empresa'));
    }
    public function update(UpdateRequest $request, Empresa $empresa)
    {
        if($request->hasFile('picture')){
            $archivo = $request->file('picture');
            $image_name = time().'_'.$archivo->getClientOriginalName();
            $archivo->move(public_path("/image"),$image_name);
        }

        $empresa->update($request->all()+[
            'logo'=>$image_name,
        ]);

        return redirect()->route('empresa.index');
    }
}
