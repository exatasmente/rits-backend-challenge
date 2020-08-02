<?php

namespace Tests\Feature;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ClienteControllerTest extends TestCase
{
    use RefreshDatabase;
    public function setUp() : void
    {
        parent::setUp();
        $this->cliente = factory(User::class)->state('cliente')->create();
        $this->actingAs($this->cliente);
        $this->produtos = factory(Produto::class,100)->create();
    }

    /** @test */
    public function test_it_should_list_users_order()
    {
        Auth::login($this->cliente);
        $response = $this->withoutExceptionHandling()->get('/api/produtos/');

        $response->assertStatus(200);
    }
}
