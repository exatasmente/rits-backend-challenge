<?php


namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Pedido as PedidoResource;
class PedidoCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
