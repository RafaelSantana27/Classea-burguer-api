<?php

namespace App\Http\Requests;

class AdicionalRequest extends BaseFormRequest
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
            'nome' => 'required|string|max:50',
            'preco' => 'required|numeric|min:0',
            'ativo' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [

            // nome
            'nome.required' => 'O nome do adicional é obrigatório.',
            'nome.string' => 'O nome do adicional deve ser um texto válido.',
            'nome.max' => 'O nome da categoria não pode ter mais que 50 caracteres.', 

            // preco
            'preco.required' => 'O preço do produto é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número válido.',
            'preco.min' => 'O preço deve ser maior que zero.',

            // ativo
            'ativo.boolean' => "O campo 'ativo' deve ser verdadeiro ou falso (true ou false).",
        ];
    }
}
