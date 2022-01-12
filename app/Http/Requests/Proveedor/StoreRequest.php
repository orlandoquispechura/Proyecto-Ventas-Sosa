<?php

namespace App\Http\Requests\Proveedor;

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
            
            'razon_social'  => 'required|regex:/^[A-Z, a-z, ,á,í,é,ó,ú,ñ,&]+$/|max:50|unique:proveedors',
            'nit'           => 'required|min:10|max:11|regex:/^[0-9]{10,11}$/|unique:proveedors',
            'email'         => 'nullable|email|max:100|unique:proveedors',
            'direccion'     => 'nullable|string|max:100',
            'telefono'      => 'nullable|min:7|max:8|regex:/^[0-9]{7,8}$/|unique:proveedors', 
            'celular'       => 'nullable|min:8|max:12|regex:/^[+,0-9]{8,12}$/|unique:proveedors',            

        ];
    }
    public function messages()
    {
        return[
            'telefono.regex' => 'No se permite texto solo números.',
            'celular.regex' => 'Solo permite el signo de adición(+).',
        ];
    }
}
