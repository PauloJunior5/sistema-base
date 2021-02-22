<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaisRequest extends FormRequest
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
            'pais' => [
                Rule::unique('paises', 'pais')->ignore($this->id),
            ],
            // Substituido pelo padão da documentação.
            // 'pais' => 'unique:paises,pais|max:50'
        ];
    }
}
