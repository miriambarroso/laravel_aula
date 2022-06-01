<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BancoRequest extends FormRequest
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
            'numero' => 'required|unique:banco',
            'ispb' => 'required|numeric',
            'nome' => 'required',
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
            'nome.required' => 'Nome é obrigatório.',
            'ispb.required' => 'ISPB é obrigatório.',
            'ispb.numeric' => 'ISPB é um campo numérico.',
            'numero.unique' => 'Número deve ser um campo Único, verifique se não está já cadastrado, ou tente outro número.',

        ];
    }
}
