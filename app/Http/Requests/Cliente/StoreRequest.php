<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

            'nombre' => 'required|regex:/^[A-Z,a-z, ,á,í,é,ó,ú,ñ]+$/|max:50',
            'apellido_paterno' => 'nullable|regex:/^[A-Z,a-z, ,á,í,é,ó,ú,ñ]+$/|max:50',
            'apellido_materno' => 'nullable|regex:/^[A-Z,a-z, ,á,í,é,ó,ú,ñ]+$/|max:50',
            'dni' => 'nullable|min:7|max:10|regex:/^[A-Z,0-9]+$/|unique:clientes',
            'direccion' => 'nullable|max:100',
            'telefono' => 'nullable|min:7|max:8|regex:/^[0-9]{7,8}$/|unique:clientes',
            'email' => 'nullable|email|max:100|unique:clientes',
        ];
    }
}
