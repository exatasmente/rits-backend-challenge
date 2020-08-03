<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroClienteValidator;
use App\Http\Resources\Cliente as ClienteResource;
use App\Services\ClienteService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function store(Request $request, ClienteService $clientes)
    {
        return new ClienteResource($clientes->create($request->input()));
    }
}
