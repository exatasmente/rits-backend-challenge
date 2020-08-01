<?php
namespace App\Repositories;

use App\Models\Pedido;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

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

    public function createPedido($clienteId,$produtos){
        $pedido = $this->create([
            'user_id' => $clienteId,
            'status'  => Pedido::PENDENTE
        ]);
        $produtos = collect($produtos)->reduce(function($actual,$produto){
            if(!array_key_exists($produto['id'],$actual)){
                $actual[$produto['id']] = [
                    'quantidade' => $produto['quantidade'],
                ];
            }
            return $actual;
        },[]);
        $pedido->produtos()->attach($produtos);
        return $pedido;
    }

    public function destroy($id)
    {
        $pedido = $this->find($id);
        if(!Auth::user()->can('destroy',$pedido)) {
            throw new AuthorizationException();
        }
        return $this->delete($id);
    }
}
