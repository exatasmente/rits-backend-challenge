<?php

namespace App\Services;

use App\Events\NovoPedidoEvent;
use App\Validators\PedidoStoreValidator;
use App\Repositories\PedidoRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PedidoService extends BaseService
{

    public function __construct(PedidoRepository $pedidoRepository)
    {
        parent::__construct($pedidoRepository);
        $this->repo->setSortBy('status');
        $this->repo->setRelations(['produtos','cliente']);
    }

    public function createPedido($clienteId,$data){
        $validator = new PedidoStoreValidator($data);
        $produtos = $validator->validate();
        $pedido = $this->repo->createPedido($clienteId,$produtos);
        event(new NovoPedidoEvent($pedido));
        return $pedido;
    }

    public function update($id, array $input){
        $pedido = parent::update($id,$input);
        //events
    }
}
