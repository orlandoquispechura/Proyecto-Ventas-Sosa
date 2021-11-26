<?php

namespace App\Http\Requests\Empresa;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         
        return [
            // $table->string('nombre_negocio');
            // $table->string('descripcion')->nullable();
            // $table->string('logo')->nullable();
            // $table->string('mail')->nullable();
            // $table->string('direccion')->nullable();
            // $table->string('nit')->nullable();

            'nombre_negocio' => 'required|regex:/^[A-Z,a-z, ,á,í,é,ó,ú,ñ,&]+$/|max:50',
            'descripcion' => 'nullable|string|max:100',
            'mail' => 'nullable|email|string|unique:empresas,mail,' . $this->route('empresa')->id . '|max:100',
            'direccion' => 'nullable|max:100',
            'nit' => 'required|min:10|max:11|regex:/^[0-9]{10,11}$/',
            'logo' => 'nullable|mimes:jpg,png,jpeg,bmp',            
        ];
    }
}
