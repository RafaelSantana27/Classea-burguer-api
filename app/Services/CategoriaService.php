<?php

namespace App\Services;

use App\Exceptions\ResourceNotFoundExecption;
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
        $categoria = $this->categoriaRepository->find($id);

        if(!$categoria){
            throw new ResourceNotFoundExecption("Categoria não encontrada.");
        }

        return $categoria;
    }

    public function atualizarCategoria(string $id, array $dados) 
    {    
        $this->buscarPorId($id);        
        return $this->categoriaRepository->update($id, $dados);
    }

    public function deletarCategoria($id)
    {
        $this->buscarPorId($id);
        return $this->categoriaRepository->delete($id);
    }
}