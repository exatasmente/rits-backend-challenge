<?php
namespace App\Repositories;

use App\Models\User;

class ClienteRepository extends Repository
{
    protected $model;
    public function __construct(User $cliente)
    {
        $this->model = $cliente;
    }

    public function find($id){
        return $this->model->with($this->relations)->findOrFail($id);
    }

    public function findPedido($clienteId,$pedidoId){
        $cliente = $this->find($clienteId);
        $pedido $cliente->pedidos()->with('produtos')findOrFail($pedidoId)
        return $pedido;
    }

}
