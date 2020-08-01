<?php

namespace App\Policies;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PedidosPolicy
{
    use HandlesAuthorization;

    public function update(User $user,Pedido $pedido){
        return $pedido->user_id === $user->id;
    }

    public function destroy(User $user,Pedido $pedido){
        return $pedido->user_id === $user->id;
    }
}
