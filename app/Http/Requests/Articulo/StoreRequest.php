<?php

namespace App\Http\Requests\Articulo;

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
            'nombre' => 'required|regex:/^[A-Z,a-z, ,á,í,é,ó,ú,ñ]+$/|unique:articulos|max:50',
            'precio_venta' => 'required|between:0,9999,99',
            'codigo' => 'nullable|string|max:8|min:8',
            'imagen' => 'nullable|mimes:jpg,png,jpeg,bmp',
        ];
    }
}
