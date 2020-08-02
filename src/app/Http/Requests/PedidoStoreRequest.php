<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoStoreRequest extends FormRequest
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

    protected function validated()
    {
        $validated = parent::validated();
        
        $produtos = collect($validated['produtos'])->reduce(function($actual,$produto){
            if(!array_key_exists($produto['id'],$actual)){
                $actual[$produto['id']] = [
                    'quantidade' => $produto['quantidade'],
                ];
            }
            return $actual;
        },[]);
        $validated['produtos'] = $produtos;

        return $validated;
    }
 
}
