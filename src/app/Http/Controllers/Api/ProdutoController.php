<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProdutoService;

class ProdutoController extends Controller
{

    public function index(ProdutoService $produtos){
        return $produtos->all();
    }

    public function show(ProdutoService $produtos, $id){
        return $produtos->find($id);
    }

}
