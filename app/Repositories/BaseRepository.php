<?php

namespace App\Repositories;

use App\Repositories\Contract\BaseContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseContract
{
    public function __construct(
        protected Model $model
        )
    {
    }

    public function all(): Collection
    {
        return $this->model->all()?->makeHidden(['created_at', 'updated_at']);
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id)?->makeHidden(['created_at', 'updated_at']);
    }

    public function create(array $data): ?Model
    {
        $new = $this->model->create($data);
        return $new?->makeHidden(['created_at', 'updated_at']);
    }

    public function update(Model $model): ?Model
    {
        $model->save();
        return $model;
    }

    public function delete(Model $model): ?Model
    {
        $model->delete();
        return $model;
    }
    
    // ------------------ > Anterior <------------------
    // public function update(int $id, array $data): ?Model
    // {
    //     $update = $this->model->find($id);
    //     $update->update($data);
    //     return $update?->makeHidden(['created_at', 'updated_at']);
    // }

    // public function delete(int $id): ?Model
    // {
    //     $delete = $this->model->find($id);
    //     $delete->delete();
    //     return $delete;
    // }
}