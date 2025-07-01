<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use App\Services\ApiResponse;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos produtos da base de dados
        return ApiResponse::sucesso(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        // Add novo 'Produto' na base de dados
        $dadosProduto = $request->validated();

        $dadosProduto['imagem'] = $this->uploadImagem($request);

        $produto = Produto::create($dadosProduto);

        return ApiResponse::sucesso($produto, 'Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir um Produto em especifico
        $produto = Produto::Find($id);

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
        $dadosProduto = $request->validated();
        
        $produto = Produto::find($id);

        if(!$produto) {
            return ApiResponse::erro('Produto não encontrado');
        }

        $oldImage = $produto->imagem;

        if ($request->hasFile('imagem')) {
            $dadosProduto['imagem'] = $this->uploadImagem($request);
            $this->destroyFileImage($oldImage);
        }else {
            unset($dadosProduto['imagem']);
        }

        $produto->update($dadosProduto);
        return ApiResponse::sucesso($produto, 'Produto Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Deletar uma Categoria
        $produto = Produto::find($id);

        if(!$produto) {
            return ApiResponse::erro('Produto não encontrado');
        }

        $produto->delete();
        $this->destroyFileImage($produto['imagem']);

        return ApiResponse::sucesso($produto['nome'], 'Produto deletado com sucesso!');
    }

    /**
     * Funções personalizadas 
     */

    private function uploadImagem($request)
    {
        if($request->hasFile('imagem')) {
            return Storage::disk('public')->put('cardapio', $request->file('imagem'));
        }

        return 'cardapio/default.png';
    }

    private function destroyFileImage($requestDelete)
    {
        if($requestDelete != 'cardapio/default.png') {
            Storage::disk('public')->delete($requestDelete);
        }
    }
}
