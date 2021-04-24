<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PacienteRequest extends FormRequest
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
            'cpf' => [
                Rule::unique('pacientes', 'cpf')->ignore($this->cpf),
            ],
            'rg' => [
                Rule::unique('pacientes', 'rg')->ignore($this->rg),
            ],
        ];
    }
}
