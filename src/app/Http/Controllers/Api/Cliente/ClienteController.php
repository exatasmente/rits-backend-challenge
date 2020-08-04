<?php

namespace App\Http\Controllers\Api\Cliente;

use App\Http\Controllers\Controller;
use App\Services\ClienteService;
use App\Http\Resources\Cliente as ClienteResource;

class ClienteController extends Controller
{
    public function show(ClienteService $clientes,$clienteId){
        return new ClienteResource($clientes->find($clienteId));
    }
}
