<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoClienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'produtos.*.id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1'
        ];
    }
    public function messages()
    {
        return [
            'produtos.*.exists' => 'O Produto é inválido',
            'produtos.*.quantidade.*' => 'Quantidade de produtos inválida'
        ];
    }
}
