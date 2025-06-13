<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retorna todas as categorias da base de dados
        return response()->json(Categoria::all(), 200);
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

        return response()->json(
            [
                'message' => 'Categoria cadastrada com sucesso!',
                'data' => $categoria,
            ], 200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir uma Categoria em especifico
        $categoria = Categoria::Find($id);

        if($categoria) {
            return response()->json($categoria, 200);
        } else {
            return response()->json([
                'message' => 'Categoria não encontrada'
            ], 404);
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
            return response()->json([
                'message' => 'Categoria atualizada com sucesso!',
                'data' => $categoria
            ], 200);
        } else {
             return response()->json([
                'message' => 'Categoria não encontrada'
            ], 404);
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
            return response()->json([
                'message' => 'Categoria deletada com sucesso!',
            ], 200);
        } else {
             return response()->json([
                'message' => 'Categoria não encontrada'
            ], 404);
        }
    }
}
