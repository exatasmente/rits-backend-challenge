<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Pedido as PedidoResource;
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
            'pedidos'  => PedidoResource::collection($this->pedidos)
        ];
    }
}
