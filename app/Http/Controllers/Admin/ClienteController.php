<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    public function index(){
        return view('admin.cliente.cliente-list');
    }
}
