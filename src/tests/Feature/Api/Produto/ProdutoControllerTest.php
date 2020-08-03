<?php

namespace Tests\Feature\Api\Produto;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoControllerTest extends TestCase
{

    public $cliente;
    public $produtos;
    public function setUp() : void
    {
        parent::setUp();
        $this->cliente = factory(User::class)->state('cliente')->create();
        $this->produtos = factory(Produto::class,100)->create();
    }

    /**
     * @test
     * @group api-cliente
     * @group cliente-produtos
     */
    public function test_it_should_list_produtos()
    {
        $response = $this->getJson('/api/produtos?cliente_id='.$this->cliente->id);
        $response->assertStatus(200);
        $produtos = $this->produtos->reduce(function($actual,$produto){
            $actual[$produto->id] =[
                'nome' => $produto->nome,
                'preco' => number_format($produto->preco,2)
            ] ;
            return $actual;
        },[]);

        $data = $response->json();
        $produtos = collect($data['data'])->filter(function ($produto) use ($produtos){
            $produtoId = $produto['id'];
            return array_key_exists($produtoId, $produtos);
        });
        $this->assertTrue($produtos->count() == $this->produtos->count());
    }
}
