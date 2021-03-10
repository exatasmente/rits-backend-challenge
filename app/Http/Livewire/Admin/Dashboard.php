<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pedido;
use App\Models\Pedido as PedidoModel;
use Livewire\Component;
use Livewire\WithPagination;
class Dashboard extends Component
{
    public $searchString;

    public function mount(){
        $this->searchString = null;
    }
    public function render()
    {
        $searchResult = [];
        if($this->searchString != null){
            $searchResult = PedidoModel::where('id',intval($this->searchString))
                ->with(['produtos','cliente'])
                ->get();

        }
        return view('livewire.admin.dashboard',[
            'searchResult' => $searchResult
        ]);
    }


}
