<?php

namespace App\Http\Requests\Articulo;

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

            'nombre'        => 'regex:/^[A-Z,a-z, ,á,í,é,ó,ú,ñ]+$/|required|unique:articulos,nombre,' . $this->articulo . '|max:50',
            'precio_venta'  => 'required|between:0,9999,99',
            'stock'         => 'numeric|required|min:0|max:100',
            'imagen'        => 'nullable|mimes:jpg,png,jpeg,bmp',
            'codigo'        => 'nullable|string|max:8|min:8',

            'categoria_id' => 'integer|required|exists:App\Models\Categoria,id',
            'proveedor_id' => 'integer|required|exists:App\Models\Proveedor,id',
        ];
    }
}
