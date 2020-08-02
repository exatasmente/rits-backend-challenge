<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoDestroyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'pedido' => 'required|exists:pedidos,id',
        ];
    }
    public function messages()
    {
        return [
            'pedido.exists' => 'O Pedido não existe',
            'pedido.required' => 'O Pedido é obrigatório'
        ];
    }
}
