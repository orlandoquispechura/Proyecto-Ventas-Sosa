<?php

namespace App\Http\Requests\Cliente;

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
            'nombre' => 'required|string|max:50',
            'apellido_paterno' => 'required|string|max:50',
            'apellido_materno' => 'nullable|string|max:50',
            'dni' => 'required|min:7|unique:clientes,dni,' . $this->route('cliente')->id . '|max:10',
            'direccion' => 'nullable|max:100',
            'telefono' => 'nullable|min:7|unique:clientes,telefono,' . $this->route('cliente')->id . '|max:20',
            'email' => 'required|email|string|unique:clientes,email,' . $this->route('cliente')->id . '|max:100',
        ];
    }
}
