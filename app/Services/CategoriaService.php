<?php

namespace App\Services;

use App\Repositories\CategoriaRepository;

class CategoriaService 
{
    protected $categoriaRepository;

    public function __construct(CategoriaRepository  $categoriaRepository )
    {
        $this->categoriaRepository = $categoriaRepository;
    }


    public function todasCategoria()
    {
        return ApiResponse::sucesso($this->categoriaRepository->all());
    }

    public function cadastrarCategoria(array $dados) 
    {
        $categoria = $this->categoriaRepository->create($dados);
        return ApiResponse::sucesso($categoria, 'Categoria cadastrada com sucesso');
    }

    public function buscarPorId(string $id)
    {
        $categoria = $this->categoriaRepository->find($id);

        if(!$categoria) {
            return ApiResponse::erro('Categoria não encontrada');
        }
        
        return ApiResponse::sucesso($categoria);
    }

    public function atualizarCategoria(string $id, array $dados) 
    {    
        $categoria = $this->categoriaRepository->update($id, $dados);

        if (!$categoria) {
            return ApiResponse::erro('Categoria não encontrada');
        }

        return ApiResponse::sucesso($categoria, 'Categoria atualizada com sucesso!');
    }

    public function deletarCategoria($id)
    {
        $categoria = $this->categoriaRepository->delete($id);

        if (!$categoria) {
            return ApiResponse::erro('Categoria não encontrada');
        }

        return ApiResponse::sucesso($categoria['nome'], 'Categoria deletada com sucesso!');
    }

}