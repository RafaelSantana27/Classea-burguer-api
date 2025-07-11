<?php

namespace App\Exceptions;

use App\Http\Response\BaseResponse;
use Exception;

class ResourceNotFoundExecption extends Exception{

    public function render($resquest) 
    {
        return BaseResponse::erros($this->getMessage(), null, 404);
    }
}