<?php

namespace Tests\Feature\Admin;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public $admin;
    public $produtos;
    public function setUp() : void
    {
        parent::setUp();
        $this->admin = factory(User::class)->state('admin')->create();
        $this->produtos = factory(Produto::class,100)->create();
    }

    /**
     * @test
     * @group admin-dashboard
     */
    public function test_it_should_see_cliente_i()
    {

        $response = $this->getJson('/api/cliente/'.$this->cliente->id);
        $response->assertSuccessful();

    }
}
