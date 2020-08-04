<?php

namespace App\Http\Livewire\Admin;

use App\Jobs\UpdatePedidoStatus;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Pedido as PedidoModel;
class Pedido extends Component
{
    public $pedido;
    public $openModal = false;

    public function mount($pedido){
        $this->pedido = $pedido;
    }
    public function closeModal(){
        $this->openModal = false;
    }
    public function verDetalhes(){
        $this->openModal = true;
    }
    public function render()
    {
        return view('livewire.admin.pedido');
    }

    public function confirmar(){
        DB::transaction(function () {
            DB::table('pedidos')
                ->lockForUpdate()
                ->where('id',$this->pedido->id)
                ->update(['status' => $this->getNewStatus()]);
            $this->emit('pedidoUpdated',['pedido' => $this->pedido->id]);
        });
        UpdatePedidoStatus::dispatch($this->pedido)->onQueue('emails');

    }

    public function getNewStatus(){
        switch($this->pedido->status ){
            case PedidoModel::PENDENTE:
                return PedidoModel::EM_PREPARO;
            case PedidoModel::EM_PREPARO:
                return  PedidoModel::EM_ENTREGA;
            case PedidoModel::EM_ENTREGA:
                return PedidoModel::ENTREGUE;
            default:
                return $this->pedido->status;
        }
    }

}
