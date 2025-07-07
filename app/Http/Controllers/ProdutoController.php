<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Services\ProdutoService;

class ProdutoController extends Controller
{
    protected $produtoService;

    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos produtos da base de dados
        $produtos = $this->produtoService->todosProdutos();
        return $produtos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        // Add novo 'Produto' na base de dados
        $dadosProduto = $this->produtoService->cadastrarProduto($request->validated());
        return $dadosProduto;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir um Produto em especifico
        $produto = $this->produtoService->buscarPorId($id);
        return $produto;        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, string $id)
    {
        // Atualizar um 'Produto'
        $dadosProduto = $this->produtoService->atualizarProduto($id, $request->validated());
        return $dadosProduto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Deletar uma Categoria
        $produto = $this->produtoService->deletarProduto($id);
        return $produto;
    }
}
