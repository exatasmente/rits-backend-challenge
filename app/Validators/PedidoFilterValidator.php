<?php

namespace App\Validators;


use Illuminate\Support\Facades\Validator;

class PedidoFilterValidator extends BaseValidator
{

    public function rules()
    {
        return [
            'status' => 'in:pendente,em_preparo,em_entrega,entregue,cancelado'
        ];
    }
    public function messages()
    {
        return [
            'status.in' => 'o valor do status é inválido'
        ];
    }

    public function validate()
    {
        $validated = parent::validate();
        $status = [
            'pendente' => 1,
            'em_preparo' => 2,
            'em_entrega' => 3,
            'entregue' => 4,
            'cancelado' => 5
        ];
        if(array_key_exists('status',$validated)) {
            return $status[$validated['status']];
        }
        return $validated;
    }

}
