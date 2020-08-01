<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroClienteRequest;
use App\Services\ClienteService;

class RegisterController extends Controller
{
    protected $service;
    public function __construct(ClienteService $clientes){
        $this->service = $clientes;
    }
    public function store(CadastroClienteRequest $request)
    {
        $valid = $request->validated();
        if($valid) {
            return $this->service->create($request->input());
        }else{
            return response()->json($valid);
        }
    }

    public function show(){
        return view('welcome');
    }
}
