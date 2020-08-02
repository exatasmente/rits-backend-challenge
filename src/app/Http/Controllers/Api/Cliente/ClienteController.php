<?php

namespace App\Http\Controllers\Api\Cliente;

use App\Http\Controllers\Controller;
use App\Services\ClienteService;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Cliente as ClienteResource;
class ClienteController extends Controller
{
    public function index(ClienteService $clientes){
        return new ClienteResource($clientes->find(Auth::user()->id));
    }
}
