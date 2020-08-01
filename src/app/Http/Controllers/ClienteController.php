<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;

class ClienteController extends Controller
{
    public function index(ClienteService $clientes){
        return $clientes->all();
    }

    public function show(ClienteService $clientes, $id){
        return $clientes->find($id);
    }
}
