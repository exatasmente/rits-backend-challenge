<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoSearchRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required',
            'preco_min' => 'regex:/^\d*(\.\d{2})?$/|min:1',
            'preco_max' => 'regex:/^\d*(\.\d{2})?$/|min:2',
            'ordem' => "in:'asc','desc'|default:'asc'"
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome do Produto é obrigatório',
            'preco_min' => 'O Preço minimo é inválido'
        ];
    }

    public function validated()
    {
        $validated = parent::validated();
        $search = [[
            'field' => 'nome',
            'value' => '%'.$validated['nome'].'%',
            'operator' => 'like',
        ]];
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
