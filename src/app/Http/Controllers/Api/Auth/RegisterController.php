<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroClienteRequest;
use App\Services\ClienteService;

class RegisterController extends Controller
{

    public function store(CadastroClienteRequest $request,ClienteService $clientes)
    {
        $valid = $request->validated();
        if($valid) {
            return $clientes->create($request->input());
        }else{
            return response()->json($valid);
        }
    }

    public function show(){
        return view('welcome');
    }
}
