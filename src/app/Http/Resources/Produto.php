<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Produto extends JsonResource
{

    public function toArray($request)
    {
        $response =[
            'id' => $this->id,
            'nome' => $this->nome,
            'preco' => $this->preco,
        ];
        if($this->pivot != null){
            $response['quantidade'] =  $this->pivot->quantidade;
        }
        return $response;
    }
}
