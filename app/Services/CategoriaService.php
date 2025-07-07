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
        return $this->categoriaRepository->all();
    }

    public function cadastrarCategoria(array $dados) 
    {
        return $this->categoriaRepository->create($dados);
    }

    public function buscarPorId(string $id)
    {
        return $this->categoriaRepository->find($id);
    }

    public function atualizarCategoria(string $id, array $dados) 
    {    
        return $this->categoriaRepository->update($id, $dados);
    }

    public function deletarCategoria($id)
    {
        return $this->categoriaRepository->delete($id);
    }
}