<?php

namespace App\Http\Requests\Proveedor;

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

            'razon_social' => 'required|regex:/^[A-Z,a-z, ,á,í,é,ó,ú,ñ,&]+$/|unique:proveedors,razon_social,' . $this->route('proveedor')->id . '|max:50',
            'nit' => 'nullable|min:10|max:11|regex:/^[0-9]{10,11}$/|unique:proveedors,nit,' . $this->route('proveedor')->id,
            'email' => 'nullable|email|string|unique:proveedors,email,' . $this->route('proveedor')->id . '|max:100',
            'direccion' => 'nullable|string|max:100',
            'telefono' => 'nullable|min:7|max:8|regex:/^[0-9]{7,8}$/|unique:proveedors,telefono,' . $this->route('proveedor')->id,
        ];
    }
}
