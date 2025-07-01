<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mockery\Generator\Method;

class ProdutoRequest extends BaseFormRequest
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
        return  [
            'nome' => 'required|string|min:3|max:100',
            'descricao' => 'nullable|string|max:500',
            'preco' => 'required|numeric|min:0.01',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ativo' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            // nome
            'nome.required' => 'O nome do produto é obrigatório.',
            'nome.string' => 'O nome do produto deve ser um texto válido.',
            'nome.min' => 'O nome do produto deve ter no mínimo 3 caracteres.', 
            'nome.max' => 'O nome do produto não pode ter mais que 500 caracteres.', 
            
            // descricao
            'descricao.string' => 'A descrição do produto deve ser um texto válido.',
            'descricao.max' => 'A descrição do produto não pode ter mais que 1000 caracteres.',

            // preco
            'preco.required' => 'O preço do produto é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número válido.',
            'preco.min' => 'O preço deve ser maior que zero.',

            // categoria_id
            'categoria_id.required' => 'A categoria é obrigatória.',
            'categoria_id.exists' => 'A categoria selecionada não existe.',

            // imagem
            'imagem.image' => 'O arquivo deve ser uma imagem válida.',
            'imagem.mimes' => 'A imagem deve estar no formato: jpg, jpeg ou png.',
            'imagem.max' => 'A imagem não pode ter mais que 2MB.',

            // ativo
            'ativo.required' => 'O campo "ativo" é obrigatório.',
            'ativo.boolean' => 'O campo "ativo" deve ser verdadeiro ou falso (true ou false).',
        ];
    }
}
