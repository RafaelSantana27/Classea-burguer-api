<?php

namespace App\Services;

use App\Exceptions\ResourceNotFoundExecption;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\UploadedFile;
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

        if($arquivo instanceof UploadedFile) {
            $dados['imagem'] = $this->uploadImagem($arquivo);
        } else {
            $dados['imagem'] = 'cardapio/default.png'; 
        }
        
        $produto = $this->produtoRepository->create($dados);

        return $produto;
    }

    public function buscarPorId(string $id)
    {
        $produto = $this->produtoRepository->find($id);

        if(!$produto) {
            throw new ResourceNotFoundExecption("Produto não encontrado.");
        }

        return $produto;
    }

    public function atualizarProduto(string $id, $dados) 
    {    
        $produto = $this->buscarPorId($id);
        
        $oldImage = $produto->imagem;
        $arquivo = $dados['imagem'] ?? null;
        
        if($arquivo instanceof UploadedFile) {
            $dados['imagem'] = $this->uploadImagem($arquivo);
            $this->destroyFileImage($oldImage);
        }else {
            unset($arquivo);
        }
        
        $produtoAtualizado = $this->produtoRepository->update($id, $dados);
        return $produtoAtualizado;
    }

    public function deletarProduto($id)
    {
        $produto = $this->buscarPorId($id);
        $this->destroyFileImage($produto['imagem']);
              
        return $this->produtoRepository->delete($id);
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