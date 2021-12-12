<?php

namespace App\Http\Requests\Compra;

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
            'proveedor_id' => 'required',
            'articulo_id' => 'required',
            'cantidad' => 'min:0|max:3|required|between:0,100',
            'precio_compra' => 'required|between:0,10000',
            'total' => 'required|between:0,1000000',
        ];
    }
    public function messages()
    {
        return[
            'proveedor_id.required' => 'El campo de proveedor es requerido',

            'articulo_id.required' => 'El campo de artículo es requerido',

            'total.required' => 'El campo total es requerido',
            'total.between' => 'El total excede del rango 1000000.',

            'cantidad.required' => 'La cantidad es requerida',

            'precio_compra.required' => 'El precio de la compra es requerido',
        ];
    }
}
