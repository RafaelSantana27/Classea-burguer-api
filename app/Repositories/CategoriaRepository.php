<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Repositories\Contract\CategoriaContract;

class CategoriaRepository extends BaseRepository
{
    public function __construct(
        protected Categoria $categoria
    )
    {
        parent::__construct($this->categoria);
    }

    public function buscarAtivos() //Função criada para TESTE........
    {
        return $this->categoria->where('ativo', true)->get()
                ?->makeHidden(['created_at', 'updated_at']);
    }
}