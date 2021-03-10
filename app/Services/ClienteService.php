<?php

namespace App\Services;

use App\Models\Pedido;
use App\Repositories\ClienteRepository;
use App\Validators\ClienteCreateValidator;
use App\Validators\PedidoFilterValidator;
use Illuminate\Auth\Access\AuthorizationException;


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
        $filterBy = null;
        if(request()->has('status')) {
            $validator = new PedidoFilterValidator(request()->only('status'));
            $filterBy = $validator->validate();
        }
        return $this->repo->getPedidos($clienteId,$filterBy);
    }

    public function destroyPedido($clienteId,$pedidoId){
        $cliente = $this->repo->find($clienteId);
        $pedido = $this->repo->findPedido($clienteId,$pedidoId);
        if(!$cliente->can('destroy',$pedido)){
            throw new AuthorizationException();
        }
        $pedido->status = Pedido::CANCELADO;
        $pedido->save();
        return $pedido;

    }

    public function create(array $input){
        $validator = new ClienteCreateValidator($input);
        $data = $validator->validate();
        return $this->repo->create($data);
    }

}
