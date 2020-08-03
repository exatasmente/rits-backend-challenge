<?php

namespace App\Http\Controllers\Api\Produto;

use App\Http\Controllers\Controller;
use App\Http\Resources\Produto as ProdutoResource;
use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoSearchController extends Controller
{

    public function index(Request $request, ProdutoService $produtos){

        return ProdutoResource::collection($produtos->search($request->input()));
    }


}
