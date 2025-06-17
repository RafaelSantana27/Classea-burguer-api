<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos usuarios Cadastrados da base de dados
        return ApiResponse::sucesso(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar dados Novo usuario
        $request->validate(
            [
                'name' => 'required|string|min:2|max:100',
                'email' => 'required|email|max:255|unique:users,email',
                'ativo' => 'boolean',
            ],
            [
                'name.required' => 'O nome do usuário é obrigatório.',
                'name.string' => 'O nome do usuário deve ser um texto válido.',
                'name.min' => 'O nome do usuário deve ter no mínimo 2 caracteres.', 
                'name.max' => 'O nome do usuário não pode ter mais que 255 caracteres.',

                'email.required' => 'O campo de e-mail é obrigatório.',
                'email.email' => 'O e-mail informado não é válido.',
                'email.max' => 'O e-mail não pode ter mais que 255 caracteres.',

                'ativo.boolean' => 'O campo "ativo" deve ser verdadeiro ou falso (true ou false).',
            ]
        );

        // Add nova Categoria na base de dados
        // $categoria = Categoria::create($request->all());

        // return ApiResponse::sucesso($categoria, 'Categoria cadastrada com sucesso');
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
