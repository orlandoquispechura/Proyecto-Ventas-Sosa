<?php

namespace App\Http\Requests\User;

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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        //'email' => 'nullable|email|unique:clientes,email,' . $this->route('cliente')->id . '|max:100',

            // 'name' => 'required|max:20|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ñ,&]+$/',
            // 'email' => 'required|email|max:100,|unique:users,email,'. $this->route('user')->id,
            // 'password' => 'nullable',
            // 'role' => 'nullable',
        ];
    }
}
