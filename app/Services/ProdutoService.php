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
        return ApiResponse::sucesso($this->produtoRepository->all());
    }

    public function cadastrarProduto($dados) 
    {
        $arquivo = $dados['imagem'] ?? null;

        if($arquivo instanceof \Illuminate\Http\UploadedFile) {
            $dados['imagem'] = $this->uploadImagem($arquivo);
        } else {
            $dados['imagem'] = 'cardapio/default.png'; 
        }
        
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

    public function atualizarProduto(string $id, $dados) 
    {    
        $produto = $this->produtoRepository->find($id);
        
        if(!$produto) {
            return ApiResponse::erro('Produto não encontrado');
        }
        
        $oldImage = $produto->imagem;
        $arquivo = $dados['imagem'] ?? null;
        
        if($arquivo instanceof \Illuminate\Http\UploadedFile) {
            $dados['imagem'] = $this->uploadImagem($arquivo);
            $this->destroyFileImage($oldImage);
        }else {
            unset($arquivo);
        }
        
        $produto = $this->produtoRepository->update($id, $dados);

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

    private function uploadImagem($arquivoIMG)
    {
        return $arquivoIMG->store('cardapio', 'public');
    }

    private function destroyFileImage($requestDelete)
    {
        if($requestDelete !== 'cardapio/default.png') {
            Storage::disk('public')->delete($requestDelete);
        }
    }
}