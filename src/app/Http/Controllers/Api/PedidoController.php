<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PedidoClienteRequest;
use App\Services\ClienteService;
use App\Services\PedidoService;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    protected $clientes;

    public function index(ClienteService $clientes){
        return $clientes->find(Auth::user()->id)->pedidos;
    }

    public function store(PedidoClienteRequest $request,PedidoService $pedidos){
        return $pedidos->createPedido(Auth::user()->id,$request->get('produtos'));
    }

    public function destroy(PedidoService $pedidos,$pedidoId)
    {
      return $pedidos->destroy($pedidoId);
    }

}
