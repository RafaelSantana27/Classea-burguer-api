<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use App\Services\ApiResponse;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as 'Categorias' da base de dados
        return ApiResponse::sucesso(Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        // Add nova 'Categoria' na base de dados
        $categoria = Categoria::create($request->validated());
        return ApiResponse::sucesso($categoria, 'Categoria cadastrada com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir uma 'Categoria' em especifico
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
    public function update(CategoriaRequest $request, string $id)
    {
        // Atualizar uma 'Categoria'
        $categoria = Categoria::Find($id);

        if($categoria) {
            $categoria->update($request->validated());
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
