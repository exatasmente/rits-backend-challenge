<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class ClienteApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->has('cliente_id')) {
            return response()->json([
                'error' => 'Cliente inválido, forneça um cliente'
            ]);
        }else {
            $user = User::find($request->get('cliente_id'));
            if($user != null){
                Auth::login($user);
            }
        }
        return $next($request);
    }
}
