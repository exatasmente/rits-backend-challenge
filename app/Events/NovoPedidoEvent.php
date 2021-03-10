<?php

namespace App\Events;

use App\Models\Pedido;
use App\Models\User;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;


class NovoPedidoEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pedido;
    public function __construct(Pedido $pedido)
    {

        $this->pedido = $pedido;
    }
    public function broadcastOn()
    {
        Log::info($this->pedido->id);
        return new Channel('pedidos');
    }
}
