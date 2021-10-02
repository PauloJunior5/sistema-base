<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContratoRequest extends FormRequest
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
            'contrato' => [
                Rule::unique('contratos', 'contrato')->ignore($this->id),
            ],
            'id_responsavel' => [
                Rule::exists('clientes', 'id')->where(function ($query) {
                    $query->where('tipo', 'pessoaFisica')->get();
                }),
            ],
            'id_cliente' => [
                Rule::exists('clientes', 'id')->where(function ($query) {
                    $query->where('tipo', 'pessoaJuridica')->get();
                }),
            ],
        ];
    }
}
