<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        // Validar request
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
        ]);

        // login attemp
        $email = $request->input('email');
        $password = $request->input('password');
        $attempt  = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);

        if(!$attempt) {
            return response()->json([
                'error' => 'Não autorizado'
            ], 401);
        }

        // autentificação do Usuario
        $user = auth()->user();
        $token = $user->createToken($user->name)->plainTextToken;

        // return the acess token fo the api request
        return response()->json(['token' => $token]);


        // Validação
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     // Tentativa de login
    //     if (!auth()->attempt($credentials)) {
    //         return response()->json(['error' => 'Não autorizado'], 401);
    //     }

    //     // Recupera usuário autenticado
    //     $user = auth()->user();

    //     // Verificação extra (por segurança)
    //     if (!$user) {
    //         return response()->json(['error' => 'Erro ao autenticar'], 401);
    //     }

    //     // Gera token com Sanctum
    //     $token = $user->createToken($user->name)->plainTextToken;

    //     // Retorna token e dados do usuário
    //     return response()->json([
    //         'token' => $token,
    //         'user' => $user
    //     ]);

    }
}
