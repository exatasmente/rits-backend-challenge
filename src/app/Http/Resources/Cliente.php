<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cliente extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->name,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'created_at' => $this->created_at,
        ];
    }
}
