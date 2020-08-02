<?php

namespace App\Services;

use App\Repositories\PedidoRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;


class PedidoService extends BaseService
{
    public function __construct(PedidoRepository $pedidoRepository)
    {
        parent::__construct($pedidoRepository);
        $this->repo->setSortBy('status');
        $this->repo->setRelations(['produtos','cliente']);
    }

    public function createPedido($clienteId,$produtos){
        return $this->repo->createPedido($clienteId,$produtos);
    }

    public function update($id, array $input){
        $pedido = parent::update($id,$input);
        //events
    }

    public function destroy($id){
        $pedido = $this->repo->find($id);
        if(!Auth::user()->can('destroy',$pedido)){
            throw new AuthorizationException();
        }
        $status = parent::destroy($id);

        //events

        return $status;
    }

}
