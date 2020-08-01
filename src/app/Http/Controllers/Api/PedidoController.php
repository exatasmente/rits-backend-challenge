<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PedidoClienteRequest;
use App\Http\Requests\PedidoDestroyRequest;
use App\Http\Requests\PedidoStoreRequest;
use App\Services\ClienteService;
use App\Services\PedidoService;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    protected $clientes;

    public function index(ClienteService $clientes){
        return $clientes->find(Auth::user()->id)->pedidos;
    }
    public function show(PedidoService $pedidos,ClienteService $clientes,$pedidoId){
        $cliente =  $clientes->find(Auth::user()->id);
        return $pedidos->find(optional($cliente->pedidos()->find($pedidoId))->id);

    }
    public function store(PedidoStoreRequest $request,PedidoService $pedidos){
        return $pedidos->createPedido(Auth::user()->id,$request->get('produtos'));
    }

    public function destroy(PedidoDestroyRequest $request,PedidoService $pedidos)
    {
      return $pedidos->destroy($request->input());
    }

}
