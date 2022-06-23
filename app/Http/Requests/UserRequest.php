<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required|confirmed'
        ];
    }

    /**
    * Pega as mensagens de erros após a validação.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório.',
            'email.unique' => 'Email já cadastrado.',
            'password.confirmed' => 'As senhas não coincidem'

        ];
    }
}
