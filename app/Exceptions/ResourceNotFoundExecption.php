<?php

namespace App\Exceptions;

use Exception;

class ResourceNotFoundExecption extends Exception{

    public function render($resquest) 
    {
        return response()->json(
            [
                'codigo_status' => 404,
                'mensagem' => $this->getMessage()
            ],
            404
        );
    }
}