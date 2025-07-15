<?php

namespace App\Repositories;

use App\Models\User;

class UsuarioRepository extends BaseRepository 
{
    public function __construct(
        protected User $user
    )
    {
        parent::__construct($this->user);
    }

    public function buscarUsuariosAdmin() //Função criada para TESTE........
    {
        return $this->user->where('is_admin', true)->get()
                ?->makeHidden(['created_at', 'updated_at']);
    }
}