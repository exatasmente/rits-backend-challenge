<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Services\ClienteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function show()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validator = $request->validate([
            'email'     => 'required',
            'password'  => 'required|min:6'
        ]);

        if (Auth::attempt($validator)) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->with('error','Cliente inválido');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return back();
    }

}
