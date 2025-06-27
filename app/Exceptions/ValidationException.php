<?php

namespace App\Exceptions;

use Exception;

class ValidationException  extends Exception{

    public function render($resquest) 
    {
        return response($this->getMessage(), $this->getCode());
    }
}