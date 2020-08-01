<?php
namespace App\Repositories;

use App\Models\Pedido;

class PedidoRepository extends Repository
{
    protected $model;
    public function __construct(Pedido $pedido)
    {
        $this->model = $pedido;
    }

    public function find($id){
       return $this->model->with($this->relations)->findOrFail($id);
    }
}
