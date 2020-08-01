<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'telefone',
        'endereco'
    ];

    protected $hidden = [
        'password',
    ];

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
