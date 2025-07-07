<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Services\ApiResponse;
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
        return ApiResponse::sucesso($produtos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        // Add novo 'Produto' na base de dados
        $dadosProduto = $this->produtoService->cadastrarProduto($request->validated());
        return ApiResponse::sucesso($dadosProduto, 'Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir um Produto em especifico
        $produto = $this->produtoService->buscarPorId($id);

        if(!$produto) {
            return ApiResponse::erro('Produto não encontrado');
        }

        return ApiResponse::sucesso($produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, string $id)
    {
        // Atualizar um 'Produto'
        $dadosProduto = $this->produtoService->atualizarProduto($id, $request->validated());

        if(!$dadosProduto) {
            return ApiResponse::erro('Produto não encontrado');
        }

        return ApiResponse::sucesso($dadosProduto, 'Produto Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Deletar uma Categoria
        $produto = $this->produtoService->deletarProduto($id);

        if(!$produto) {
            return ApiResponse::erro('Produto não encontrado');
        }

        return ApiResponse::sucesso($produto['nome'], 'Produto deletado com sucesso!');
    }
}
