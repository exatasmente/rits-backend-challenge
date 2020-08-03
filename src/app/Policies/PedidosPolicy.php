<?php

namespace App\Policies;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PedidosPolicy
{
    use HandlesAuthorization;

    public function update(User $user,Pedido $pedido){
        return $pedido->user_id === $user->id
             ? Response::allow()
             : Response::deny('Você não é o dono desse pedido.');
    }

    public function destroy(User $user,Pedido $pedido){
        return $pedido->user_id === $user->id
            ? Response::allow()
            : Response::deny('Você não é o dono desse pedido.');
    }
}
