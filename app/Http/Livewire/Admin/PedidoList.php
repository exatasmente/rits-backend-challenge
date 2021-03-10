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
    public $pedidosTotal;
    public $paginationCount;
    protected $listeners = ['pedidoUpdated' => '$refresh'];

    public function paginationView()
    {
        return 'pagination';
    }

    public function resolvePage()
    {
        return $this->page;
    }
    public function nextPage(){
        if($this->page*$this->paginationCount < $this->pedidosTotal) {
            $this->page += 1;
        }
    }
    public function previousPage(){
        if($this->page > 1) {
            $this->page -= 1;
        }
    }

    public function mount(int $type,$grid= false,$listName){
        $this->type = $type;
        $this->grid = $grid;
        $this->listName = $listName;
        $this->paginationCount = 5;
    }

    public function pedidoUpdated($status){
    }

    public function incrementPagination(){
        if($this->paginationCount < 10) {
            $this->paginationCount = $this->paginationCount + 1;
        }
    }
    public function decrementPagination(){
        if($this->paginationCount > 1) {
            $this->paginationCount = $this->paginationCount - 1;
        }
    }

    public function render()
    {

        $pedidos = Pedido::where('status',$this->type)
            ->with(['produtos','cliente'])
            ->orderBy('id')
            ->orderBy('updated_at','desc');
        $this->pedidosTotal = $pedidos->count();
        $pedidos = $pedidos->simplePaginate($this->paginationCount);
        return view('livewire.admin.pedido-list',[
            'pedidos' => $pedidos
        ]);
    }
}
