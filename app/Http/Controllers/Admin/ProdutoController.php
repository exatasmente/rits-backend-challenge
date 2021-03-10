<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProdutoController extends Controller
{
    public function index(){
        return view('admin.produto.produto-list');
    }
    public function update($produto){
        return view('admin.produto.produto-form',[
            'produto'=>$produto
        ]);
    }
    public function create(){
        return view('admin.produto.produto-form',[
            'produto' => null
        ]);
    }
}
