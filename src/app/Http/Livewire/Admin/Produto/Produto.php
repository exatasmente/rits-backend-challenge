<?php

namespace App\Http\Livewire\Admin\Produto;

use Livewire\Component;
use App\Models\Produto as ProdutoModel;
use Livewire\WithPagination;

class Produto extends Component
{
    use WithPagination;
    public $searchString = '';
    public $sortOrder = 'desc';
    public $open = false;
    public $seletedProduto = null;

    protected $updatesQueryString = [
        'searchString' => ['except' => ''],
        'page' => ['except' => 1],
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
    public function closeModal(){
        $this->open = false;
        $this->seletedProduto = null;
    }
    public function confirmModal($produtoId){
        $this->open = true;
        $this->seletedProduto = $produtoId;
    }
    public function remover(){
        ProdutoModel::findOrFail($this->seletedProduto)
            ->delete();
        $this->closeModal();
        session()->flash('success','Produto Excluido com Sucesso!');


    }
    public function render()
    {
        $produtos = ProdutoModel::where('nome', 'like', '%'.$this->searchString.'%')
            ->orderBy('updated_at',$this->sortOrder)
            ->paginate(10);

        return view('livewire.admin.produto.produtos-list',[
            'produtos' => $produtos
        ]);
    }
}
