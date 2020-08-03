<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;
use App\Validators\ProdutoSearchValidator;


class ProdutoService extends BaseService
{
    public function __construct(ProdutoRepository $produtoRepository)
    {
        parent::__construct($produtoRepository);
        $this->repo->setSortBy('created_at');
        $this->repo->setSortOrder('asc');

    }

    public function search($data)
    {
        $validator = new ProdutoSearchValidator($data);
        $search = $validator->validate();
        return parent::search($search);
    }
}
