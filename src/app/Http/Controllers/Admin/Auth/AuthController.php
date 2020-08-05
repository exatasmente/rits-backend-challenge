<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
