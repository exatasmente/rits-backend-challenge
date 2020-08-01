<?php

namespace App\Services;

use App\Repositories\PedidoRepository;


class PedidoService extends BaseService
{
    public function __construct(PedidoRepository $pedidoRepository)
    {
        $this->repo = $pedidoRepository;
        $this->repo->setSortBy('status');
        $this->repo->setRelations(['produtos','cliente']);
    }
}
