<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class NotificationTracker extends Component
{
    public $showNotification;
    public $notificationMessage;
    public function mount(){
        $this->showNotification = true;
    }
    public function getListeners()
    {
        return [
            'echo:laravel_database_pedidos,NovoPedidoEvent' => 'notifyNovoPedido',
            'close-notification' => 'closeNotification'
        ];
    }
    public function closeNotification(){
        $this->showNotification = false;
    }
    public function notifyNovoPedido($data)
    {
        $this->showNotification = true;
        $this->notificationMessage = 'Novo Pedido: #'.$data['pedido']['id'];
        session()->flash('success','Novo Pedido: #'.$data['pedido']['id']);
        $this->emit('pedidoUpdated');
    }

    public function render()
    {
        return view('shared.alerts.success');
    }
}
