<?php

namespace App\Http\Requests;


class CategoriaRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:2|max:100',
            'ativo' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome da categoria é obrigatório.',
            'nome.string' => 'O nome da categoria deve ser um texto válido.',
            'nome.min' => 'O nome da categoria deve ter no mínimo 2 caracteres.', 
            'nome.max' => 'O nome da categoria não pode ter mais que 100 caracteres.', 

            'ativo.boolean' => "O campo 'ativo' deve ser verdadeiro ou falso (true ou false).",
        ];
    }

    
}
