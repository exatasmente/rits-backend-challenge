<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Repositories\ClienteRepository;
use App\Services\ClienteService;
use Closure;
use Illuminate\Support\Facades\Auth;

class ClienteApiMiddleware
{
    protected $clientes;
    public function __construct(ClienteRepository $clientes){
        $this->clientes = $clientes;;
    }

    public function handle($request, Closure $next)
    {
        if (!$request->has('cliente_id')) {
            return response()->json([
                'error' => 'Cliente inválido, forneça um cliente'
            ],403);
        }else{
            $user = $this->clientes->find($request->get('cliente_id'));
            Auth::login($user);
        }
        return $next($request);
    }
}
