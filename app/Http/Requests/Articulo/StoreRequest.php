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
            'nombre' => 'required|string|max:50',
            'precio_venta' => 'required',
            'codigo' => 'nullable|string|max:8|min:8',
            'cantidad' => 'numeric|required',
            'imagen' => 'nullable|mimes:jpg,png,jpeg,bmp',
        ];
    }
}
