<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PedidoService;
use App\Services\ProdutoService;

class ProdutoPedidoController extends Controller
{

    public function index(ProdutoService $produtos,$produtoId){
        return $produtos->find($produtoId)->pedidos;
    }

}
