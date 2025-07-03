<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe base para repositórios, contendo operações CRUD genéricas.
 */
abstract class AbstractRepository implements RepositoryInterface
{
    protected static $model;

    /**
     * Carrega dinamicamente a instância do modelo associado.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function loadModel(): Model
    {
        return app(static::$model);
    }
    
    /**
     * Retorna todos os registros do modelo.
     * 
     * @return \Illuminate\Support\Collection
     */
    public static function all():Collection 
    {
        return self::loadModel()::all();
    }
    
    /**
     * Busca um registro pelo ID.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function find(int $id): ?Model
    {
        return self::loadModel()::query()->find($id);
    }

    /**
     * Cria um novo registro no banco de dados.
     *
     * @param  array  $dados
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function create(array $dados): ?Model
    {
        return self::loadModel()::query()->create($dados);
    }

    /**
     * Atualiza um registro existente com base no ID.
     *
     * @param  int    $id
     * @param  array  $dados
     * @return int  Número de registros atualizados (0 ou 1)
     */
    public static function update(int $id, array $dados): int
    {
        return self::loadModel()::query()->where(['id' => $id])->update($dados);
    }

    /**
     * Remove um registro do banco de dados com base no ID.
     *
     * @param  int  $id
     * @return int  Número de registros deletados (0 ou 1)
     */
    public static function delete(int $id): int
    {
        return self::loadModel()::query()->where(['id' => $id])->delete();
    }
}