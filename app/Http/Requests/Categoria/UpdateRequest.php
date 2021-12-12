<?php

namespace App\Http\Requests\Categoria;

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
            'nombre' => 'string|regex:/^[A-Z, a-z, ,á,í,é,ó,ú,ñ]+$/|required|unique:categorias,nombre,'.$this->route('categoria')->id.'|max:50',
            'descripcion'=> 'nullable|string|max:255',
        ];
    }
    public function messages(){
        return [
            'nombre.string' => 'Se necesita un nombre para la categoría.',
            'nombre.regex' => 'No se permiten números ni símbolos.',
        ];          
    }
}
