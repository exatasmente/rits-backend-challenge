<?php
namespace App\Repositories;

use App\Models\Pedido;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PedidoRepository extends BaseRepository
{
    protected $model;
    public function __construct(Pedido $pedido)
    {
        $this->model = $pedido;
    }

    public function find($id){
       return $this->model->with($this->relations)->findOrFail($id);
    }

    public function createPedido($clienteId,$produtos){
        $pedido = $this->create([
            'user_id' => $clienteId,
            'status'  => Pedido::PENDENTE
        ]);
        $pedido->produtos()->attach($produtos);

        return $pedido;
    }

    public function destroy($pedidoId){
        return $this->update($pedidoId,[
            'status' => Pedido::CANCELADO,

        ]);
    }
}
