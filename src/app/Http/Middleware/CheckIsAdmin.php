<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role != 'admin') {
            session()->flash('error','Usuário Inváido');
            Auth::logout();
            return redirect('/login');
        }
        return $next($request);
    }
}
