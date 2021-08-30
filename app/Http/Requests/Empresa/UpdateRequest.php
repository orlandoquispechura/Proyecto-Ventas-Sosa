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
         /** 
         *'email'=> 'required|email|string||unique:proveedors,email,'.$this->route('proveedor')->id.'|max:255', */
        return [
            'nombre_negocio' => 'required|string|max:50',
            'descripcion' => 'required|string|max:100',
            'mail' => 'required|email|string|unique:empresas,mail,' . $this->route('empresa')->id . '|max:100',
            'direccion' => 'nullable|max:100',
            'nit' => 'min:7|required|max:11',
            'logo' => 'nullable|mimes:jpg,png,jpeg,bmp',            
        ];
    }
}
