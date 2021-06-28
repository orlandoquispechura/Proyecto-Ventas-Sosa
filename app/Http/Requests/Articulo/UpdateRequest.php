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
            'code' => 'nullable|string|max:8|min:8',
            'nombre' => 'required|string|max:50',
            'precio_venta' => 'required',
            'cantidad' => 'numeric|required',
            'imagen' => 'nullable|mimes:jpg,png,jpeg,bmp',
            
            'categoria_id' => 'integer|required|exists:App\Models\Categoria,id',
            'proveedor_id' => 'integer|required|exists:App\Models\Proveedor,id',
        ];
    }
}
