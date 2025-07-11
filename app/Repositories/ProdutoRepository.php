<?php

namespace App\Repositories;

use App\Models\Produto;

class ProdutoRepository extends BaseRepository 
{
    // protected static $model = Produto::class;
    public function __construct(
        protected Produto $produto
    )
    {
        parent::__construct($this->produto);
    }

    public function buscarAtivos() //Função criada para TESTE........
    {
        return $this->produto->where('ativo', true)->get()
                ?->makeHidden(['created_at', 'updated_at']);
    }
}