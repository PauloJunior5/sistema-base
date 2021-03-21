<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
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
            'cliente' => [
                'required',
                Rule::unique('clientes', 'cliente')->ignore($this->id),
            ],
            'cnpj' => [
                'required_if:tipo,==,pessoaJuridica',
                Rule::unique('clientes', 'cnpj')->ignore($this->id),
            ],
            'cpf' => [
                'required_if:tipo,==,pessoaJuridica',
                Rule::unique('clientes', 'cpf')->ignore($this->id),
            ],
        ];
    }
}
