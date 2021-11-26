<?php

namespace App\Http\Requests\Categoria;

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
            'nombre' => 'regex:/^[A-Z, a-z, ,á,í,é,ó,ú,ñ]+$/|required|unique:categorias|max:50',
            'descripcion'=> 'nullable|string|max:255',            
        ];
    }
}
