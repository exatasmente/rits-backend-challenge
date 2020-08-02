<?php
namespace App\Repositories;

use App\Models\Pedido;
use App\Models\User;

class ClienteRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;
    public function __construct(User $cliente)
    {
        $this->model = $cliente;
    }

    public function findPedido($clienteId,$pedidoId){
        $cliente = $this->find($clienteId);
        $this->setRelations(['pedidos','pedidos.produtos']);
        $pedido = $cliente->pedidos()->findOrFail($pedidoId);
        return $pedido;
    }

    public function getPedidos($clienteId){
        $this->setRelations(['pedidos','pedidos.produtos']);
        $cliente = $this->find($clienteId);

        return $this->executeQuery($cliente->pedidos());

    }

}
