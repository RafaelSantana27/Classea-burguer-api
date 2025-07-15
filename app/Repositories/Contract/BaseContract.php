<?php

namespace App\Repositories\Contract;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseContract
{
    public function all():Collection;
    public function find(int $id): ?Model;
    public function create(array $dados): ?Model;
    // public function update(int $id, array $dados): ?Model;
    // public function delete(int $id): ?Model;
    public function update(Model $model): ?Model;
    public function delete(Model $model): ?Model;
}