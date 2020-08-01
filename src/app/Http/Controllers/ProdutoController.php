<?php

namespace App\Http\Controllers;

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
