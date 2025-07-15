<?php

namespace App\Services;

use App\Repositories\AdicionalRepository;

class AdicionalService
{
    public function __construct(
        protected AdicionalRepository $adicionalRepository
    )
    {
    }

    public function todosAdicionais()
    {
        return $this->adicionalRepository->all();
    }
}