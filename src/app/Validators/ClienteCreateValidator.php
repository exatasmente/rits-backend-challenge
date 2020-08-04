<?php

namespace App\Validators;

class ClienteCreateValidator extends BaseValidator
{

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|min:3',
            'password' => 'required|min:6',
            'telefone' => 'required|unique:users,telefone|regex:/\([0-9]{2}\)[0-9]{9}/',
            'endereco' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'O Email é obrigatório',
            'email.unique' => 'Email já cadastrado',
            'email.email'  => 'O campo precisa ser um Email',
            'name.required' => 'O Nome é obrigatório',
            'name.string'   => 'O Nome é inválido',
            'name.min'      => 'O Nome precisa ter no mínimo 3 caracteres',
            'password.required' => 'A Senha é obrigatória',
            'password.min' => 'A Senha precisa ter no mínimo :min caracteres',
            'telefone.required' => 'O Telefone é obrigatório',
            'telefone.unique' => 'Telefone já cadastrado',
            'telefone.regex' => 'O Telefone é inválido',
            'endereco.required' => 'O Endereço é obrigatório'
        ];
    }
}
