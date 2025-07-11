<?php

namespace App\Exceptions;

use App\Http\Response\BaseResponse;
use Exception;

class ValidationException extends Exception{

    public function render($resquest) 
    {
        $erros = json_decode($this->getMessage(), false);
        return BaseResponse::erros("Ocorreram erros de validação", $erros, $this->getCode());
    }
}