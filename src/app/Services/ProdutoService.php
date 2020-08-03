<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;


class ProdutoService extends BaseService
{
    public function __construct(ProdutoRepository $produtoRepository)
    {
        parent::__construct($produtoRepository);
        $this->repo->setSortBy('created_at');
        $this->repo->setSortOrder('asc');

    }
}
