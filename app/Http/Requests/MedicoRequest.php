<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MedicoRequest extends FormRequest
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
            'crm' => [
                Rule::unique('medicos', 'crm')->ignore($this->crm),
            ],
            'cpf' => [
                Rule::unique('medicos', 'cpf')->ignore($this->cpf),
            ],
            'rg' => [
                Rule::unique('medicos', 'rg')->ignore($this->rg),
            ],
        ];
    }
}
