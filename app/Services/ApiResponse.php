<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function sucesso($data, $mensagem = 'Sucesso'): JsonResponse
    {
        return response()->json(
            [
                'codigo_status' => 200,
                'mensagem' => $mensagem,
                'data' => $data
            ],
            200
        );
    }

    public static function erro($mensagem): JsonResponse
    {
        return response()->json(
            [
                'codigo_status' => 500,
                'mensagem' => $mensagem
            ],
            500
        );
    }

    public static function naoAutorizado(): JsonResponse
    {
        return response()->json(
            [
                'codigo_status' => 401,
                'mensagem' => 'Acesso não Autorizado'
            ],
            401
        );
    }
}