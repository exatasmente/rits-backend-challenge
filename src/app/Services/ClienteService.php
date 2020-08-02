<?php

namespace App\Services;

use App\Repositories\ClienteRepository;


class ClienteService extends BaseService
{
    public function __construct(ClienteRepository $clienteRepository)
    {
        parent::__construct($clienteRepository);
        $this->repo->setRelations(['pedidos']);

    }

    public function findPedido($clienteId,$pedidoId){
        return $this->repo->findPedido($clienteId,$pedidoId);
    }

    public function getPedidos($clienteId){
        return $this->repo->getPedidos($clienteId);
    }

}
