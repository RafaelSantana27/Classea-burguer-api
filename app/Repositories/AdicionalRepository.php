<?php

namespace App\Repositories;

use App\Models\Adicional;

class AdicionalRepository extends BaseRepository
{
    public function __construct(
        protected Adicional $adicional
    )
    {
        parent::__construct($this->adicional);
    }

    public function buscarAtivos() //Função criada para TESTE........
    {
        return $this->adicional->where('ativo', true)->get()
                ?->makeHidden(['created_at', 'updated_at']);
    }
}