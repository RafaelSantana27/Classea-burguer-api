<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoService
{
    protected $produtoRepository;

    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function todosProdutos()
    {
        return ApiResponse::sucesso($this->produtoRepository->buscarProdutosAtivos());
    }

    public function cadastrarProduto(Request $request) 
    {
        $dados = $request->validated();

        $dados['imagem'] = $this->uploadImagem($request);
        
        $produto = $this->produtoRepository->create($dados);

        return ApiResponse::sucesso($produto, 'Produto cadastrado com sucesso');
    }

    public function buscarPorId(string $id)
    {
        $produto = $this->produtoRepository->find($id);

        if(!$produto) {
            return ApiResponse::erro('Produto não encontrado');
        }
        
        return ApiResponse::sucesso($produto);
    }

    public function atualizarProduto(string $id, Request $request) 
    {    
        $dadosProduto = $request->validated(); //Verificar depois se da para melhorar ordem

        $produto = $this->produtoRepository->find($id);
        
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
        
        $produto = $this->produtoRepository->update($id, $dadosProduto);

        return ApiResponse::sucesso($produto, 'Produto Atualizado com sucesso');
    }

    public function deletarProduto($id)
    {
        $produto = $this->produtoRepository->delete($id);

        if(!$produto) {
            return ApiResponse::erro('Produto não encontrado');
        }

        $this->destroyFileImage($produto['imagem']);
        return ApiResponse::sucesso($produto['nome'], 'Produto deletado com sucesso!');
    }

    /**
     ******** Funções personalizadas 
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
        if($requestDelete !== 'cardapio/default.png') {
            Storage::disk('public')->delete($requestDelete);
        }
    }
}