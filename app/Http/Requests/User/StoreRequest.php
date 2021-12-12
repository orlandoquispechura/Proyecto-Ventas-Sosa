<?php

namespace App\Http\Requests\User;

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
            'name' => 'required|max:20|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ñ,&]+$/',
            'email' => 'required|email|max:100|unique:users,email',
            // 'password' => 'required|min:8|max:10|regex:/^[A-Z,a-z,#,$,&][0-9]{8,10}$/',
            'password' => [
                'required',
                'min:8',
                'max:10',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ],
            'role'=>'nullable', 
        ];
    }
}
