<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Http\Response\BaseResponse;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    public function __construct(
        protected UsuarioService $usuarioService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos os 'Usuarios' da base de dados
        $usuarios = $this->usuarioService->TodosUsuarios();
        return BaseResponse::sucesso('Lista de usuarios carregada com sucesso', $usuarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        // Add novo 'Usuario' na base de dados
        $usuario = $this->usuarioService->cadastrarUsuario($request->validated());
        return BaseResponse::sucesso('Usuario cadastrado com sucesso', $usuario);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir um 'Usuario' em especifico
        $usuario = $this->usuarioService->buscarPorId($id);
        return BaseResponse::sucesso("Usuario identificado com sucesso", $usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, string $id)
    {
        // Atualizar um 'Usuario'
        $usuario = $this->usuarioService->atualizarUsuario($id, $request->validated());
        return BaseResponse::sucesso('Usuario atualizado com sucesso', $usuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Deletar um 'Usuario'
        $usuario = $this->usuarioService->deletarUsuario($id);
        return BaseResponse::sucesso('Usuario deletado com sucesso', $usuario['name']);
    }
}
