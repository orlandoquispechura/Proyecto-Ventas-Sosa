<?php

namespace App\Http\Requests\Venta;

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
            'cliente_id' => 'required',
            'articulo_id' => 'required',
            'cantidad' => 'required',
            'total' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'cliente_id.required' => 'El campo de cliente es requerido',

            'articulo_id.required' => 'El campo de artículo es requerido',

            'total.required' => 'El campo total es requerido',

            'cantidad.required' => 'La cantidad es requerida',

            'precio_compra.required' => 'El precio de la compra es requerido',
        ];
    }
}
