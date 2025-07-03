<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public static function all():Collection;
    public static function create(array $dados):Model|null;
    public static function find(int $id):Model|null;
    public static function update(int $id, array $dados):int;
    public static function delete(int $id):int;
    public static function loadModel():Model;
}