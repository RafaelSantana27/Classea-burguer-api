<?php

namespace App\Services;

use App\Exceptions\ResourceNotFoundExecption;
use App\Repositories\AdicionalRepository;

class AdicionalService
{
    public function __construct(
        protected AdicionalRepository $adicionalRepository
    )
    {
    }

    public function todosAdicionais()
    {
        return $this->adicionalRepository->all();
    }

    public function cadastrarAdicional(array $dados) 
    {
        return $this->adicionalRepository->create($dados);
    }

    public function buscarPorId(string $id)
    {
        $adicional = $this->adicionalRepository->find($id);

        if(!$adicional){
            throw new ResourceNotFoundExecption("Adicional não encontrado.");
        }

        return $adicional;
    }

    public function atualizarAdiconal(string $id, array $dados) 
    {    
        $adicional = $this->buscarPorId($id);   
        $adicional->fill($dados);     
        return $this->adicionalRepository->update($adicional);
    }

    public function deletarAdicional($id)
    {
        $adicional = $this->buscarPorId($id);   
        return $this->adicionalRepository->delete($adicional);
    }
}