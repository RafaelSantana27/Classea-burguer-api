<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;

class BaseResponse 
{
    public $sucesso;
    public $mensagem;
    public $data;
    public $erros;
    public $timestamp;

    public function __construct($sucesso, $mensagem, $data = null, $erros = null)
    {
        $this->sucesso = $sucesso;
        $this->mensagem = $mensagem;
        $this->data = $data;
        $this->erros = $erros;
        $this->timestamp = now()->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i:s');
    }

    public static function sucesso(?string  $mensagem, $data) : JsonResponse
    {
        return response()->json(new BaseResponse(true, $mensagem, $data), 200);
    }

    public static function erros(string $mensagem, $erros, $codigo = 400) : JsonResponse
    {
        return response()->json(new BaseResponse(false, $mensagem, null, $erros), $codigo);
    }












}