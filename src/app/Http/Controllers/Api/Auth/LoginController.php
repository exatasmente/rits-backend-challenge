<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\ClienteService;

class LoginController extends Controller
{
    public function index(ClienteService $clientes){
        return $clientes->all();
    }

    public function show(ClienteService $clientes){
        return $clientes->all();
    }
}
