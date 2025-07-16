<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuarioRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $emailRule = ['required', 'string', 'email', 'max:255'];
        $passwordRule = ['string', 'min:6', 'confirmed'];

        if(Request::isMethod('put')) {
            $emailRule[] = Rule::unique('users', 'email')->ignore($this->route('usuario'));
            $passwordRule[] = 'nullable';
        }else {
            $emailRule[] = 'unique:users,email';
            $passwordRule[] = 'required';
        }

        return [
            'name' => 'required|string|max:100',
            'email' => $emailRule,
            'password' => $passwordRule,
            'is_admin' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            // nome
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais que 100 caracteres.',

            // email
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais que 255 caracteres.',
            'email.unique' => 'Este e-mail já está em uso.',

            // senha
            'password.required' => 'A senha é obrigatória.',
            'password.string' => 'A senha deve ser um texto.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'password.confirmed' => 'O campo de confirmação de senha não confere.',
            
            // admin
            'is_admin.boolean' => 'O campo de administrador deve ser verdadeiro ou falso.',
        ];
    }
}
