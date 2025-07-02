<?php

namespace App\Services;

use App\Models\Categoria;

class CategoriaService 
{
    public function todasCategoria()
    {
         return ApiResponse::sucesso(Categoria::all());
    }

    public function cadastrarCategoria(array $dados) 
    {
        $categoria = Categoria::create($dados);

        return ApiResponse::sucesso($categoria, 'Categoria cadastrada com sucesso');
    }

    public function buscarPorId(string $id)
    {
        $categoria = Categoria::find($id);

        if(!$categoria) {
            return ApiResponse::erro('Categoria não encontrada');
        }
        
        return ApiResponse::sucesso($categoria);
    }

    public function atualizarCategoria(string $id, array $dados) 
    {    
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return ApiResponse::erro('Categoria não encontrada');
        }

        $categoria->update($dados);
        return ApiResponse::sucesso($categoria, 'Categoria atualizada com sucesso!');
    }

    public function deletarCategoria($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return ApiResponse::erro('Categoria não encontrada');
        }

        $categoria->delete();
        return ApiResponse::sucesso($categoria, 'Categoria deletada com sucesso!');
    }

}