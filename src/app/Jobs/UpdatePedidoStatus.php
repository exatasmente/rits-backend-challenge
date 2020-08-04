<?php

namespace App\Jobs;

use App\Models\Pedido;
use App\Notifications\PedidoStatusUpdated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdatePedidoStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $pedido;
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }


    public function handle()
    {
        $cliente = $this->pedido->cliente;
        $cliente->notify(new PedidoStatusUpdated($this->pedido));
    }
}
