<?php

namespace App\Http\Livewire\Admin\Cliente;

use Livewire\Component;
use App\Models\User as ClienteModel;
use Livewire\WithPagination;

class ClienteList extends Component
{
    use WithPagination;
    public $search = '';
    public $sortOrder = 'asc';
    protected $updatesQueryString = [
        'search' => ['except' => ''],
    ];

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
    public function clearSearch(){
        $this->searchString = '';

    }

    public function render()
    {
        $clientes = ClienteModel::where('role','cliente')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderBy('created_at',$this->sortOrder)
            ->paginate(10);
        return view('livewire.admin.cliente.clientes-list',[
            'clientes' => $clientes
        ]);
    }
}
