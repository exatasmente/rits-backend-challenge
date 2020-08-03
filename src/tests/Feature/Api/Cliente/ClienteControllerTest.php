<?php

namespace Tests\Feature;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ClienteControllerTest extends TestCase
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
     */
    public function test_it_should_see_cliente_info()
    {

        $response = $this->getJson('/api/cliente/'.$this->cliente->id);
        $response->assertSuccessful();

    }
}
