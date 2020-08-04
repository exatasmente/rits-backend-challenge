<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pedido;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class PedidoList extends Component
{
    use WithPagination;
    public $type;
    public $grid;
    public $listName;

    public function paginationView()
    {
        return 'pagination';
    }

    public function resolvePage()
    {
        return $this->page;
    }
    public function previousPage(){
        $this->page = $this->page - 1;
    }
    public function nextPage(){
        $this->page = $this->page + 1;
    }

    public function mount(int $type,$grid= false,$listName){
        $this->type = $type;
        $this->grid = $grid;
        $this->page = 1;
        $this->listName = $listName;
    }


    public function render()
    {
        $pedidos = Pedido::where('status',$this->type)->with(['produtos','cliente'])->simplePaginate(10);
        $pedidos->withPath('paginate');
        return view('livewire.admin.pedido-list',[
            'pedidos' => $pedidos
        ]);
    }
}
