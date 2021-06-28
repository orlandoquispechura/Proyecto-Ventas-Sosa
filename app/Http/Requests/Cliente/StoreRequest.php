<?php

namespace App\Http\Requests\Cliente;

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
            /**$table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('dni')->unique();
            $table->string('direccion')->nullable();
            $table->string('telefono')->unique()->nullable();
            $table->string('email')->nullable()->unique(); */

            'nombre' => 'required|string|max:50',
            'apellido_paterno' => 'required|string|max:50',
            'apellido_materno' => 'nullable|string|max:50',
            'dni' => 'required|min:7|unique:clientes|max:10',
            'direccion' => 'nullable|max:100',
            'telefono' => 'nullable|min:7|max:20|unique:clientes',
            'email' => 'required|email|string|max:100|unique:clientes',
        ];
    }
}
