<?php
namespace App\Repositories;

use App\Models\Produto;

class ProdutoRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;
    public function __construct(Produto $produto)
    {
        $this->model = $produto;
    }
}
