<?php

namespace App\Http\Controllers;

use App\Http\Response\BaseResponse;
use App\Services\AdicionalService;
use Illuminate\Http\Request;

class AdicionalController extends Controller
{
    public function __construct(
        protected AdicionalService $adicionalService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos os 'Adicinal' da base de dados
        $adicional = $this->adicionalService->todosAdicionais();
        return BaseResponse::sucesso('Lista de Adicional carregada com sucesso', $adicional);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
