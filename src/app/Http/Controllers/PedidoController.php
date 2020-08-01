<?php

namespace App\Http\Controllers;

use App\Services\PedidoService;

class PedidoController extends Controller
{

    public function index(PedidoService $pedidos){
        return $pedidos->all();
    }

    public function show(PedidoService $pedidos, $id){
        return $pedidos->find($id);
    }

}
