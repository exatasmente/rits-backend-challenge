<?php

namespace Tests\Feature\Api\Pedido;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Carbon\Carbon;
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
    public function test_it_should_list_cliente_pedidos()
    {

        $pedidos = factory(Pedido::class,20)->create([
            'user_id' => $this->cliente->id,
        ])->reduce(function($actual,$pedido){
            $actual []= [
                'id' => $pedido->id,
                'produtos' => [],
                'status' => $pedido->statusString,
                'created_at' => $pedido->created_at->toDateTimeString(),
            ];
            return $actual;
        },[]);

        $response = $this->getJson('/api/cliente/'.$this->cliente->id.'/pedido');
        $response->assertStatus(200);
        $response->assertJsonPath('data',$pedidos);
    }

    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_it_should_list_as_paginate_cliente_pedidos()
    {
        $pedidos = factory(Pedido::class,20)->create([
            'status' => Pedido::PENDENTE,
            'user_id' => $this->cliente->id,
        ]);

        $response = $this->getJson('/api/cliente/'.$this->cliente->id.'/pedido?paginate=1');
        $response->assertStatus(200);

        $response->assertJsonPath('meta.total',$pedidos->count());
    }

    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_it_should_list_cliente_pedidos_filtered_by_status_pendente()
    {
        $pedidoPendente = factory(Pedido::class)->create([
            'status' => Pedido::PENDENTE,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class)->create([
            'status' => Pedido::EM_PREPARO,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class)->create([
            'status' => Pedido::EM_ENTREGA,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class,3)->create([
            'status' => Pedido::CANCELADO,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class,3)->create([
            'status' => Pedido::ENTREGUE,
            'user_id' => $this->cliente->id,
        ]);


        $response = $this->getJson('/api/cliente/'.$this->cliente->id.'/pedido?status=pendente');
        $response->assertStatus(200);
        $response->assertJsonPath('data',[
            [
                'id' => $pedidoPendente->id,
                'produtos' => [],
                'status' => $pedidoPendente->statusString,
                'created_at' => $pedidoPendente->created_at->toDateTimeString(),
            ]
        ]);
    }

    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_it_should_list_cliente_pedidos_filtered_by_status_em_preparo()
    {
        $pedido = factory(Pedido::class)->create([
            'status' => Pedido::EM_PREPARO,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class)->create([
            'status' => Pedido::PENDENTE,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class)->create([
            'status' => Pedido::EM_ENTREGA,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class,3)->create([
            'status' => Pedido::CANCELADO,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class,3)->create([
            'status' => Pedido::ENTREGUE,
            'user_id' => $this->cliente->id,
        ]);


        $response = $this->getJson('/api/cliente/'.$this->cliente->id.'/pedido?status=em_preparo');
        $response->assertStatus(200);
        $response->assertJsonPath('data',[
            [
                'id' => $pedido->id,
                'produtos' => [],
                'status' => $pedido->statusString,
                'created_at' => $pedido->created_at->toDateTimeString(),
            ]
        ]);
    }
    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_it_should_list_cliente_pedidos_filtered_by_status_em_entrega()
    {
        $pedido = factory(Pedido::class)->create([
            'status' => Pedido::EM_ENTREGA,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class)->create([
            'status' => Pedido::PENDENTE,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class)->create([
            'status' => Pedido::EM_PREPARO,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class,3)->create([
            'status' => Pedido::CANCELADO,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class,3)->create([
            'status' => Pedido::ENTREGUE,
            'user_id' => $this->cliente->id,
        ]);


        $response = $this->getJson('/api/cliente/'.$this->cliente->id.'/pedido?status=em_entrega');
        $response->assertStatus(200);
        $response->assertJsonPath('data',[
            [
                'id' => $pedido->id,
                'produtos' => [],
                'status' => $pedido->statusString,
                'created_at' => $pedido->created_at->toDateTimeString(),
            ]
        ]);
    }
    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_it_should_list_cliente_pedidos_filtered_by_status_entregue()
    {
        $pedido = factory(Pedido::class)->create([
            'status' => Pedido::ENTREGUE,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class)->create([
            'status' => Pedido::PENDENTE,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class,3)->create([
            'status' => Pedido::EM_PREPARO,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class)->create([
            'status' => Pedido::EM_ENTREGA,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class,3)->create([
            'status' => Pedido::CANCELADO,
            'user_id' => $this->cliente->id,
        ]);

        $response = $this->getJson('/api/cliente/'.$this->cliente->id.'/pedido?status=entregue');
        $response->assertStatus(200);
        $response->assertJsonPath('data',[
            [
                'id' => $pedido->id,
                'produtos' => [],
                'status' => $pedido->statusString,
                'created_at' => $pedido->created_at->toDateTimeString(),
            ]
        ]);
    }

    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_it_should_list_cliente_pedidos_filtered_by_status_cancelado()
    {
        $pedido = factory(Pedido::class)->create([
            'status' => Pedido::CANCELADO,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class,3)->create([
            'status' => Pedido::EM_PREPARO,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class)->create([
            'status' => Pedido::PENDENTE,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class)->create([
            'status' => Pedido::EM_ENTREGA,
            'user_id' => $this->cliente->id,
        ]);
        factory(Pedido::class,3)->create([
            'status' => Pedido::ENTREGUE,
            'user_id' => $this->cliente->id,
        ]);


        $response = $this->getJson('/api/cliente/'.$this->cliente->id.'/pedido?status=cancelado');

        $response->assertStatus(200);
        $response->assertJsonPath('data',[
            [
                'id' => $pedido->id,
                'produtos' => [],
                'status' => $pedido->statusString,
                'created_at' => $pedido->created_at->toDateTimeString(),
            ]
        ]);
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

        $response = $this->getJson('/api/cliente/'.$this->cliente->id.'/pedido/'.$pedido->id);
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
    public function test_it_should_create_a_new_pedido()
    {
        Carbon::setTestNow();
        $produtos = $this->produtos->random(3);
        $response = $this->postJson('/api/cliente/'.$this->cliente->id.'/pedido/',[
            'produtos' => [
                [
                    'id' => $produtos[0]->id,
                    'quantidade' => 1
                ],
                [
                    'id' => $produtos[1]->id,
                    'quantidade' => 1
                ],
                [
                    'id' => $produtos[2]->id,
                    'quantidade' => 1
                ],
                [
                    'id' => $produtos[0]->id,
                    'quantidade' => 1
                ]
            ]
        ]);
        $response->assertCreated();
        $response->assertJsonPath('data.produtos',$produtos->reduce(function($actual,$produto) use($produtos){
               $actual []= [
                   'id' => $produto->id,
                   'nome' => $produto->nome,
                   'preco' => number_format($produto->preco,2),
                   'quantidade' => $produto->id == $produtos[0]->id ? 2 : 1
               ];
               return $actual;
            },
        []));
        $response->assertJsonPath('data.status','Pending');
        $response->assertJsonPath('data.created_at',Carbon::now()->toDateTimeString());
        $this->assertDatabaseHas('pedidos',[
            'status' => Pedido::PENDENTE,
            'created_at' => Carbon::now()->toDateTimeString(),
            'user_id' => $this->cliente->id
        ]);
    }

    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_quantidade_field_is_required_to_create_a_new_pedido()
    {
        Carbon::setTestNow();
        $produtos = $this->produtos->random(2);
        $response = $this->postJson('/api/cliente/'.$this->cliente->id.'/pedido/',[
            'produtos' => [
                [
                    'id' => $produtos[0]->id,
                ],
                [
                    'id' => $produtos[1]->id,
                ],
            ]
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['produtos.0.quantidade','produtos.1.quantidade']);
        $this->assertDatabaseMissing('pedidos',[
            'status' => Pedido::PENDENTE,
            'created_at' => Carbon::now()->toDateTimeString(),
            'user_id' => $this->cliente->id
        ]);
    }

    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_quantidade_field_must_be_positive_to_create_a_new_pedido()
    {
        Carbon::setTestNow();
        $produtos = $this->produtos->random(2);
        $response = $this->postJson('/api/cliente/'.$this->cliente->id.'/pedido/',[
            'produtos' => [
                [
                    'id' => $produtos[0]->id,
                    'quantidade' => -1
                ],
                [
                    'id' => $produtos[1]->id,
                    'quantidade' => 0
                ],
            ]
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['produtos.0.quantidade','produtos.1.quantidade']);
        $this->assertDatabaseMissing('pedidos',[
            'status' => Pedido::PENDENTE,
            'created_at' => Carbon::now()->toDateTimeString(),
            'user_id' => $this->cliente->id
        ]);
    }

    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_produto_id_field_is_required_create_a_new_pedido()
    {
        Carbon::setTestNow();
        $produtos = $this->produtos->random(2);
        $response = $this->postJson('/api/cliente/'.$this->cliente->id.'/pedido/',[
            'produtos' => [
                [
                    'quantidade' => 1
                ],
                [
                    'id' => $produtos[1]->id,
                    'quantidade' => 1
                ],
            ]
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['produtos.0.id']);
        $this->assertDatabaseMissing('pedidos',[
            'status' => Pedido::PENDENTE,
            'created_at' => Carbon::now()->toDateTimeString(),
            'user_id' => $this->cliente->id
        ]);
    }

    /**
     * @test
     * @group api-cliente
     * @group cliente-pedidos
     */
    public function test_produto_should_exist_to_create_a_new_pedido()
    {
        Carbon::setTestNow();
        $produtos = $this->produtos->random(2);
        $response = $this->postJson('/api/cliente/'.$this->cliente->id.'/pedido/',[
            'produtos' => [
                [
                    'id' => 99999999,
                    'quantidade' => 1
                ],
                [
                    'id' => $produtos[1]->id,
                    'quantidade' => 1
                ],
            ]
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['produtos.0.id']);
        $this->assertDatabaseMissing('pedidos',[
            'status' => Pedido::PENDENTE,
            'created_at' => Carbon::now()->toDateTimeString(),
            'user_id' => $this->cliente->id
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

        $response = $this->deleteJson('/api/cliente/'.$this->cliente->id.'/pedido/'.$pedido->id);
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

        $response = $this->deleteJson('/api/cliente/'.$this->cliente->id.'/pedido/'.$pedido->id);
        $response->assertNotFound();
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
