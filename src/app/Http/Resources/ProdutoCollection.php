<?php


namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Produto as ProdutoResource;
class ProdutoCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(fn($produto) => new ProdutoResource($produto))
        ];
    }
}
