<?php

namespace App\Validators;


use Illuminate\Support\Facades\Validator;

class PedidoStoreValidator extends BaseValidator
{

    public function rules()
    {
        return [
            "produtos" => "required",
            'produtos.*.id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1'
        ];
    }
    public function messages()
    {
        return [
            'produtos.required' => 'É necessário pelo menos um produto',
            'produtos.*.exists' => 'O Produto é inválido',
            'produtos.*.id.*' => 'Produto inválido',
            'produtos.*.quantidade.required' => 'A Quantidade de produtos é obrigatória',
            'produtos.*.quantidade.min' => 'A Quantidade de produtos é inválida',
            'produtos.*.quantidade.integer' => 'A Quantidade de produtos precisa ser um numero inteiro',
        ];
    }

    public function validate()
    {
        $validated = parent::validate();
        if(array_key_exists('produtos',$validated)) {
            $produtos = collect($validated['produtos'])->reduce(function ($actual, $produto) {
                if (!array_key_exists($produto['id'], $actual)) {
                    $actual[$produto['id']] = [
                        'quantidade' => $produto['quantidade'],
                    ];
                }else {
                    $actual[$produto['id']]['quantidade'] += $produto['quantidade'];
                }
                return $actual;
            }, []);
            $validated = $produtos;
        }
        return $validated;
    }

}
