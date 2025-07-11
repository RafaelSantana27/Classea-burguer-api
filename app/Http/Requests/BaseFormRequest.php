<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\ValidationException;
use Illuminate\Contracts\Validation\Validator;

abstract class BaseFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator->errors(), 422);
    }
}
