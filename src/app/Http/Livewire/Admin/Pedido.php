<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Pedido extends Component
{
    public $pedido;

    public function mount($pedido){
        $this->pedido = $pedido;
    }
    public function render()
    {

        return view('livewire.admin.pedido');
    }
}
