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
            'razon_social' => 'string|required|max:50',
            'nit' => 'nullable|max:20||unique:proveedors,nit,'.$this->route('proveedor')->id.'|min:7',
            'email'=> 'required|email|string||unique:proveedors,email,'.$this->route('proveedor')->id.'|max:100',
            'direccion' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20||unique:proveedors,telefono,'.$this->route('proveedor')->id.'|min:7',
        ];
    }
}
