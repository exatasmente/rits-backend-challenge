<?php

namespace App\Http\Controllers\Api\Pedido;

use App\Http\Controllers\Controller;
use App\Http\Resources\Pedido as PedidoResource;
use App\Http\Requests\PedidoDestroyRequest;
use App\Http\Requests\PedidoStoreRequest;
use App\Http\Resources\Pedido;
use App\Http\Resources\PedidoCollection;
use App\Services\ClienteService;
use App\Services\PedidoService;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    protected $clientes;

    public function index(ClienteService $clientes){
        $pedidos = $clientes->find(Auth::user()->id)->pedidos();
        return PedidoResource::collection($pedidos->paginate());
    }
    public function show(ClienteService $clientes,$pedidoId){
        $pedido = $clientes->findPedido(Auth::user()->id,$pedidoId);
        return new PedidoResource($pedido);
    }
    public function store(PedidoStoreRequest $request,PedidoService $pedidos){
        return $pedidos->createPedido(Auth::user()->id,$request->validated());
    }

    public function destroy(PedidoService $pedidos,$pedidoId)
    {
      return $pedidos->destroy($pedidoId);
    }


}
