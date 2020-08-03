<?php

namespace Tests\Feature;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PedidoControllerTest extends TestCase
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

    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_it_should_list_user_pedidos()
    {
        $response = $this->getJson('/api/cliente/pedido?cliente_id='.$this->cliente->id);
        $response->assertStatus(200);
        $response->assertJsonPath('data',[]);
    }

    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_it_should_list_user_pedido()
    {
        $pedido = factory(Pedido::class)->create([
            'status' => Pedido::PENDENTE,
            'user_id' => $this->cliente->id,
        ]);
        $produtos = $this->produtos->random(5);

        $pedido->produtos()->attach($produtos->reduce(function($actual,$produto){
            $actual[$produto->id] = [
                'quantidade' => 1
            ];
            return $actual;
        },[]));

        $response = $this->getJson('/api/cliente/pedido/'.$pedido->id.'?cliente_id='.$this->cliente->id);
        $response->assertStatus(200);
        $response->assertJsonPath('data',[
            'id' => $pedido->id,
            'produtos' => $produtos->reduce(function($actual,$produto){
                $actual []= [
                    'id' => $produto->id,
                    'nome' => $produto->nome,
                    'preco' => number_format($produto->preco,2),
                    'quantidade' => 1
                ];
                return $actual;
            },[]),
            'status' => $pedido->statusString,
            'created_at' => $pedido->created_at->toDateTimeString(),
        ]);
    }
    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_it_should_cancel_cliente_pedido()
    {
        $pedido = factory(Pedido::class)->create([
            'status' => Pedido::PENDENTE,
            'user_id' => $this->cliente->id,
        ]);
        $produtos = $this->produtos->random(5);

        $pedido->produtos()->attach($produtos->reduce(function($actual,$produto){
            $actual[$produto->id] = [
                'quantidade' => 1
            ];
            return $actual;
        },[]));

        $response = $this->deleteJson('/api/cliente/pedido/'.$pedido->id.'?cliente_id='.$this->cliente->id);
        $response->assertSuccessful();
        $this->assertDatabaseHas('pedidos',[
            'id' => $pedido->id,
            'status' => Pedido::CANCELADO
        ]);

    }
    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_it_should_not_cancel_pedido_from_other_cliente()
    {
        $cliente = factory(User::class)->state('cliente')->create();

        $pedido = factory(Pedido::class)->create([
            'status' => Pedido::PENDENTE,
            'user_id' => $cliente->id,
        ]);
        $produtos = $this->produtos->random(5);

        $pedido->produtos()->attach($produtos->reduce(function($actual,$produto){
            $actual[$produto->id] = [
                'quantidade' => 1
            ];
            return $actual;
        },[]));

        $response = $this->deleteJson('/api/cliente/pedido/'.$pedido->id.'?cliente_id='.$this->cliente->id);
        $response->assertForbidden();
        $this->assertDatabaseMissing('pedidos',[
            'id' => $pedido->id,
            'status' => Pedido::CANCELADO,
            'user_id' => $cliente->id
        ]);
        $this->assertDatabaseHas('pedidos',[
            'id' => $pedido->id,
            'user_id' => $cliente->id,
            'status' => Pedido::PENDENTE
        ]);

    }
}
