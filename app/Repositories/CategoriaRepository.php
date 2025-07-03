<?php

namespace App\Repositories;

use App\Models\Categoria;

class CategoriaRepository extends AbstractRepository 
{
    protected static $model = Categoria::class;

    public function buscarAtivos() //Função criada para TESTE........
    {
        return self::loadModel()::query()->where('ativo', true)->get();
    }
}