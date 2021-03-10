<?php

namespace App\Http\Livewire\Admin\Produto;

use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProdutoForm extends Component
{
    public $nome;
    public $preco;
    public $produtoId;

    final public function rules()
    {
        return [
            'nome' => 'required',
            'preco' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0.1',
        ];
    }
    final public function messages()
    {
        return [
            'nome.required' => 'O Nome do produto é obrigatório',
            'preco.required' => 'O Preço é obrigatório',
            'preco.regex' => 'O Preço precisa ser um número decimal'
        ];
    }
    public function mount($produto = null){
        if($produto !== null){

            $this->produtoId = $produto;
            $produto = Produto::findOrFail($produto);
            $this->fill([
                'nome' => $produto->nome,
                'preco' => $produto->preco
            ]);
        }
    }

    public function store(){
        $produto = $this->validate(
            $this->rules(),
            $this->messages()
        );
        DB::transaction(function () use ($produto){
            if($this->produtoId != null){
                DB::table('produtos')
                    ->lockForUpdate()
                    ->where('id',$this->produtoId)
                    ->update($produto);

            }else {
                Produto::create($produto);
            }
            session()->flash('success','O Produto: '.$this->nome.' foi '. ($this->produtoId == null ? 'criado!' : 'atualizado!'));
            $this->redirect(route('admin.produtos'));
        });

    }

    public function render()
    {
        return view('livewire.admin.produto.produto-form');
    }
}
