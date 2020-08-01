<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\ClienteService;

class LoginController extends Controller
{
    public function store(LoginClienteRequest $request,ClienteService $clientes)
    {
        $valid = $request->validated();
        if($valid) {
            return $clientes->create($request->input());
        }else{
            return response()->json($valid);
        }
    }
}
