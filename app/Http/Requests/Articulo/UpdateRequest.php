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

            'nombre'        => 'required|regex:/^[A-Z,a-z, ,á,í,é,ó,ú,ñ,0-9]+$/|unique:articulos,nombre,' . $this->articulo . '|max:50',
            'precio_venta'  => 'required|numeric|min:0|max:10000|between:0,10000',
            'stock'         => 'numeric|required|between:0,100',
            'imagen'        => 'nullable|mimes:jpg,png,jpeg,bmp',
            'codigo'        => 'nullable|string|min:8|max:8|regex:/^[A-Z-,0-9]+$/',

            'categoria_id' => 'integer|required|exists:App\Models\Categoria,id',
            'proveedor_id' => 'integer|required|exists:App\Models\Proveedor,id',
        ];
    }
    public function messages()
    {
        return [
            'nombre.regex' => 'Solo puede ingresar letras y números.',
            'precio_venta.between' => 'El precio debe estar en el rango de 0 a 10000.',
        ];
    }
}
