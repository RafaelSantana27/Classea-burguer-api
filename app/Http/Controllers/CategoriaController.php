<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Services\ApiResponse;
use App\Services\CategoriaService;

class CategoriaController extends Controller
{
    protected $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as 'Categorias' da base de dados
        $categorias = $this->categoriaService->todasCategoria();

        return $categorias;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        // Add nova 'Categoria' na base de dados
        $categoria = $this->categoriaService->cadastrarCategoria($request->validated());

        return $categoria;
        // return ApiResponse::sucesso($categoria, 'Categoria cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir uma 'Categoria' em especifico
        $categoria = $this->categoriaService->buscarPorId($id);
        
        return $categoria;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, string $id)
    {
        // Atualizar uma 'Categoria'
        $categoria = $this->categoriaService->atualizarCategoria($id, $request->validated());
        
        return $categoria;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Deletar uma Categoria
        // return $this->categoriaService->deletarCategoria($id);
        $categoria = $this->categoriaService->deletarCategoria($id);

        return $categoria;
    }
}
