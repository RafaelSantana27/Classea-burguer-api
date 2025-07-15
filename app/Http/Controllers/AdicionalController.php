<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdicionalRequest;
use App\Http\Response\BaseResponse;
use App\Services\AdicionalService;

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
    public function store(AdicionalRequest $request)
    {
        // Add novo 'Adicional' na base de dados
        $adicional = $this->adicionalService->cadastrarAdicional($request->validated());
        return BaseResponse::sucesso('Adicional cadastrado com sucesso', $adicional);     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir um 'Adicional' em especifico
        $adicional = $this->adicionalService->buscarPorId($id);
        return BaseResponse::sucesso("Adicinal identificado com sucesso", $adicional);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdicionalRequest $request, string $id)
    {
        // Atualizar um 'Adicional'
        $adicional = $this->adicionalService->atualizarAdiconal($id, $request->validated());
        return BaseResponse::sucesso('Adicional atualizado com sucesso', $adicional); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Deletar um 'Adicional'
        $adicional = $this->adicionalService->deletarAdicional($id);
        return BaseResponse::sucesso('Adicional deletado com sucesso!', $adicional['nome']);
    }
}
