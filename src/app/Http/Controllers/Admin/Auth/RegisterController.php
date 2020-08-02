<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroClienteRequest;
use App\Http\Resources\Cliente as ClienteResource;
use App\Services\ClienteService;

class RegisterController extends Controller
{

    public function store(CadastroClienteRequest $request,ClienteService $clientes)
    {
        return new ClienteResource($clientes->create($request->validated()));
    }
}
