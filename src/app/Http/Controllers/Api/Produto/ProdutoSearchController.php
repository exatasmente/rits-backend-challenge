<?php

namespace App\Http\Controllers\Api\Produto;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoSearchRequest;
use App\Http\Resources\Produto as ProdutoResource;
use App\Services\ProdutoService;

class ProdutoSearchController extends Controller
{

    public function index(ProdutoSearchRequest $request,ProdutoService $produtos){
        return ProdutoResource::collection($produtos->search($request->validated()));
    }


}
