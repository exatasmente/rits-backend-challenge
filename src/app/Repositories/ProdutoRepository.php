<?php
namespace App\Repositories;

use App\Models\Produto;

class ProdutoRepository extends Repository
{
    protected $model;
    public function __construct(Produto $produto)
    {
        $this->model = $produto;
    }

    public function find($id){
        return $this->model->with($this->relations)->findOrFail($id);
    }
}
