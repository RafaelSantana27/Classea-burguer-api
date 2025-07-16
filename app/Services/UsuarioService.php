<?php 

namespace App\Services;

use App\Exceptions\ResourceNotFoundExecption;
use App\Repositories\UsuarioRepository;

class UsuarioService 
{
    public function __construct(
        protected UsuarioRepository $usuarioRepository
    )
    {
    }

    public function TodosUsuarios()
    {
        return $this->usuarioRepository->all();
    }

    public function cadastrarUsuario(array $dados) 
    {
        return $this->usuarioRepository->create($dados);
    }

    public function buscarPorId(string $id)
    {
        $usuario = $this->usuarioRepository->find($id);

        if(!$usuario){
            throw new ResourceNotFoundExecption("Usuario não encontrado.");
        }

        return $usuario;
    }

    public function atualizarUsuario(string $id, array $dados) 
    {    
        $usuario = $this->buscarPorId($id);   
        $usuario->fill($dados);     
        return $this->usuarioRepository->update($usuario);
    }

    public function deletarUsuario($id) 
    {
        $usuario = $this->usuarioRepository->find($id);
        return $this->usuarioRepository->delete($usuario);
    }
}