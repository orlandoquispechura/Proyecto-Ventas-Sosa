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
            'razon_social' => 'string|required|max:50|unique:proveedors',
            'nit' => 'nullable|max:20|min:7|unique:proveedors',
            'email'=> 'required|email|string|max:100|unique:proveedors',
            'direccion' => 'nullable|string|max:100',
            'telefono'=> 'nullable|string|max:20|min:7|unique:proveedors',            
        ];
    }
}
