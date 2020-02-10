<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroUsuario extends FormRequest
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
            'nome' => 'required|max:120|min:3',
            'email' => 'required|email|unique:App\Usuario,email',
            'senha' => 'required|min:8',
            'peso' => 'required|min:2|max:5',
            'altura' => 'required|min:3',
            'nascimento' => 'required|date_format:Y-m-d',
            'sexo' => 'required|in:male, female',
            'objetivo' => 'required|in:lose, gain, define',
            'atividade' => 'required|in:sedentary, littleActive, active, veryActive'

        ];
    }

    public function messages()
    {
        return [
            'required' => 'É obrigatório o preenchimento do campo: :attribute',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'email' => 'O campo :attribute deve um email válido',
            'date_format' => 'O campo :attribute deve estar no formato :date_format',
            'email.unique' => 'Esse email já está sendo usado',
            'in' => 'O campo :attribute deve ter um dos seguintes valores \: :in',
        ];
    }
}
