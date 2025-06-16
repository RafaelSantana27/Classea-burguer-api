<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as categorias da base de dados
        return ApiResponse::sucesso(Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar a solicitação
        $request->validate(
            [
                'nome' => 'required|string|min:2|max:100',
                'ativo' => 'boolean',
            ],
            [
                'nome.required' => 'O nome da categoria é obrigatório.',
                'nome.string' => 'O nome da categoria deve ser um texto válido.',
                'nome.min' => 'O nome da categoria deve ter no mínimo 2 caracteres.', 
                'nome.max' => 'O nome da categoria não pode ter mais que 100 caracteres.', 

                'ativo.boolean' => 'O campo "ativo" deve ser verdadeiro ou falso (true ou false).',
            ]
        );

        // Add nova Categoria na base de dados
        $categoria = Categoria::create($request->all());

        return ApiResponse::sucesso($categoria, 'Categoria cadastrada com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir uma Categoria em especifico
        $categoria = Categoria::Find($id);

        if($categoria) {
            return ApiResponse::sucesso($categoria);
        } else {
            return ApiResponse::erro('Categoria não encontrada');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar a solicitação
        $request->validate(
            [
                'nome' => 'required|string|max:255',
                'ativo' => 'boolean',
            ],
            [
                'nome.required' => 'O nome da categoria é obrigatório.',
                'nome.string' => 'O nome da categoria deve ser um texto válido.',
                'nome.max' => 'O nome da categoria não pode ter mais que 255 caracteres.', 

                'ativo.boolean' => 'O campo "ativo" deve ser verdadeiro ou falso (true ou false).',
            ]
        );

         // Atualizar uma Categoria
        $categoria = Categoria::Find($id);

        if($categoria) {
            $categoria->update($request->all());
            return ApiResponse::sucesso($categoria, 'Categoria atualizada com sucesso!');
        } else {
             return ApiResponse::erro('Categoria não encontrada');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Deletar uma Categoria
        $categoria = Categoria::Find($id);

        if($categoria) {
            $categoria->delete();
            return ApiResponse::sucesso($categoria, 'Categoria deletada com sucesso!');
        } else {
             return ApiResponse::erro('Categoria não encontrada');
        }
    }
}
