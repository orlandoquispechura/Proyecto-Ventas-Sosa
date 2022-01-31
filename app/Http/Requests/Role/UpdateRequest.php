<?php

namespace App\Http\Requests\Role;

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
            'name' => 'required|regex:/^[A-Z,a-z, , á,é,í,ó,ú,ñ]+$/|unique:roles,name,' . $this->route('role')->id . '|max:20',
            'description' => 'nullable|max:100',
            'role' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'description.max' => 'La descripción no debe contener más de 100 caracteres.',
        ];
    }
}
