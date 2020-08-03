<?php

namespace App\Http\Controllers\Api\Produto;

use App\Http\Controllers\Controller;
use App\Http\Resources\Produto as ProdutoResource;
use App\Services\ProdutoService;

class ProdutoController extends Controller
{

    public function index(ProdutoService $produtos){
        return ProdutoResource::collection($produtos->all());
    }
    public function paginate(ProdutoService $produtos){
        return ProdutoResource::collection($produtos->paginated());
    }

    public function show(ProdutoService $produtos, $id){
        return new ProdutoResource($produtos->find($id));
    }

}
