<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroClienteValidator;
use App\Http\Resources\Cliente as ClienteResource;
use App\Services\ClienteService;

class RegisterController extends Controller
{

    public function store(CadastroClienteValidator $request, ClienteService $clientes)
    {
        return new ClienteResource($clientes->create($request->validated()));
    }
}
