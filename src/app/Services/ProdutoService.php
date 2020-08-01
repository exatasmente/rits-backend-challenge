<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;


class ProdutoService extends BaseService
{
    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->repo = $produtoRepository;
        
        $this->repo->setRelations(['pedidos','pedidos.cliente']);
    }
}
