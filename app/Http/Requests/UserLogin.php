<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLogin extends FormRequest
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
        return [];
    }


    public function messages()
    {
        return [
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'required' => 'O campo :attribute é obrigatório',
            'email.email' => 'O campo :attribute deve ser um email válido'
        ];
    }
}
