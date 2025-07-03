<?php

namespace App\Repositories;

use App\Models\Produto;

class ProdutoRepository extends AbstractRepository 
{
    protected static $model = Produto::class;

    public function buscarProdutosAtivos() //Função criada para TESTE........
    {
        return self::loadModel()::query()->where('ativo', true)->get();
    }
}