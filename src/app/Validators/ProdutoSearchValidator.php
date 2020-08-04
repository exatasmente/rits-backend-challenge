<?php

namespace App\Validators;



class ProdutoSearchValidator extends BaseValidator
{

    public function rules()
    {
        return [
            'nome' => 'string',
            'preco_min' => 'regex:/^\d*(\.\d{2})?$/|min:0',
            'preco_max' => 'regex:/^\d*(\.\d{2})?$/|min:1',
            'ordem' => "in:'asc','desc'"
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome do Produto é obrigatório',
            'preco_min' => 'O Preço minimo é inválido',
            'preco_max' => 'O Preço máximo é inválido'
        ];
    }

    public function validate()
    {
        $validated = parent::validate();
        $search = [];
        if(array_key_exists('nome',$validated)){
            $search = [[
                'field' => 'nome',
                'value' => '%'.$validated['nome'].'%',
                'operator' => 'like',
            ]];
        }
        if(array_key_exists('preco_min',$validated)){
            $search []= [
                'field' => 'preco',
                'value' => $validated['preco_min'],
                'operator' => '>=',
            ];
        }
        if(array_key_exists('preco_max',$validated)){
            $search []= [
                'field' => 'preco',
                'value' => $validated['preco_max'],
                'operator' => '<=',
            ];
        }

        return $search;
    }

}
