<?php

namespace App\Http\Resources;

use App\Http\Resources\Produto as ProdutoResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Cliente as ClienteResource;
class Pedido extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cliente' => new ClienteResource($this->whenLoaded('cliente')),
            'produtos' =>  ProdutoResource::collection($this->produtos),
            'status' => $this->statusString,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
