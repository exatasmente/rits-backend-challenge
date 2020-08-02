<?php

namespace App\Services;

use App\Repositories\ClienteRepository;


class ClienteService extends BaseService
{
    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->repo = $clienteRepository;
        $this->repo->setRelations(['pedidos']);
    }

    public function findPedido($clienteId,$pedidoId){
        return $this->repo->findPedido($clienteId,$pedidoId);
    }

}
