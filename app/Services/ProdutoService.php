<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;
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
        return $this->produtoRepository->all();
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

        return $produto;
    }

    public function buscarPorId(string $id)
    {
        return $this->produtoRepository->find($id);
    }

    public function atualizarProduto(string $id, $dados) 
    {    
        $produto = $this->produtoRepository->find($id);
        
        if(!$produto) {
            return;
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
        return $produto;
    }

    public function deletarProduto($id)
    {
        $produto = $this->produtoRepository->delete($id);

        if(!$produto) {
            return;
        }

        $this->destroyFileImage($produto['imagem']);
        return $produto;

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