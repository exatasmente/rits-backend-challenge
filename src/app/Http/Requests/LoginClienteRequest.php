<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginClienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:50',
            'password' => 'required|min:6',
            'telefone' => 'required|unique:users,telefone',
            'endereco' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'O Email é obrigatório',
            'name.required' => 'O Nomé é obrigatório',
            'email.unique' => 'Email inválido',
            'email.email'  => 'O campo precisa ser um Email',
            'password.required' => 'A Senha é obrigatória',
            'password.min' => 'A Senha precisa ter no mínimo 6 caracteres',
            'telefone.required' => 'O Telefone é obrigatório',
            'telefone.unique' => 'Telefone inválido',
            'endereco.required' => 'O Endereco é obrigatório'
        ];
    }
}
