<?php

namespace Tests\Unit\Models;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PedidoTest extends TestCase
{
    use RefreshDatabase;

    public $cliente;
    public $produtos;

    public function setUp() : void
    {
        parent::setUp();
        $this->cliente = factory(User::class)->state('cliente')->create();
        $this->produtos = factory(Produto::class,100)->create();
    }

    /* @test */
    public function test_pedidos_cliente_relations()
    {
        $pedido = factory(Pedido::class)->state('pendente')->create([
            'user_id' => $this->cliente->id
        ]);
        $produtos = $this->produtos->filter( fn($produto) => $produto->id <= 10);

        $pedido->produtos()->attach($produtos->reduce(function($actual,$produto){
            $actual[$produto->id] = [
                'quantidade' => rand(1, 4),
                'preco_unidade' => $produto->preco
            ];
            return $actual;
        },[]));

        $this->assertEquals(
            $this->cliente->id,
            $pedido->cliente->id
        );

        $this->assertEquals(
            $this->cliente->pedidos()->first()->id,
            $pedido->id
        );


    }

    /* @test */
    public function test_pedidos_produtos_relations()
    {
        $pedido = factory(Pedido::class)->state('pendente')->create();
        $produtos = $this->produtos->filter( fn($produto) => $produto->id <= 10);

        $pedido->produtos()->attach($produtos->reduce(function($actual,$produto){
            $actual[$produto->id] = [
                'quantidade' => rand(1, 4),
                'preco_unidade' => $produto->preco
            ];
            return $actual;
        },[]));
        $this->assertEquals(
            $produtos->pluck('id')->toArray(),
            $pedido->produtos->pluck('id')->toArray()
        );

        $this->assertEquals(
            $produtos->pluck('preco')->toArray(),
            $pedido->produtos->pluck('pivot.preco_unidade')->toArray()
        );

    }


}
