<?php

namespace App\Http\Controllers\Api\Pedido;

use App\Http\Controllers\Controller;
use App\Http\Resources\Pedido as PedidoResource;
use App\Http\Resources\Pedido;
use App\Services\ClienteService;
use App\Services\PedidoService;
use Illuminate\Http\Request;


class PedidoController extends Controller
{
    protected $clientes;

    public function index(ClienteService $clientes,$clienteId){
        $pedidos = $clientes->getPedidos($clienteId);
        return PedidoResource::collection($pedidos);
    }
    public function show(ClienteService $clientes,$clienteId,$pedidoId){
        $pedido = $clientes->findPedido($clienteId,$pedidoId);
        return new PedidoResource($pedido);
    }
    public function store(Request $request,PedidoService $pedidos,$clienteId){
        return new PedidoResource($pedidos->createPedido($clienteId,$request->input()));
    }

    public function destroy(ClienteService $clientes,$clienteId,$pedidoId)
    {
      return $clientes->destroyPedido($clienteId,$pedidoId);
    }


}
