<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ClienteService;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index(ClienteService $clientes){
        return $clientes->find(Auth::user()->id);
    }

    public function show(ClienteService $clientes){
        return $clientes->find(Auth::user()->id);
    }
}
