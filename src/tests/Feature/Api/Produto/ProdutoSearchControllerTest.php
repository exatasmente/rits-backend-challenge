<?php

namespace Tests\Feature\Api\Produto;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoSearchControllerTest extends TestCase
{
    use RefreshDatabase;
    public $cliente;

    public function setUp() : void
    {
        parent::setUp();
        $this->cliente = factory(User::class)->state('cliente')->create();

    }

    /**
     * @test
     * @group api-cliente
     * @group produtos-search
     */
    public function test_it_should_list_search_produtos_by_name()
    {
        $produtoa = factory(Produto::class)->create(['nome' => 'Produto a']);
        $produtob = factory(Produto::class)->create(['nome' => 'Produto b']);
        $produtoc = factory(Produto::class)->create(['nome' => 'Produto c']);
        $response = $this->getJson('/api/search/produtos?nome=a');
        $response->assertStatus(200);
        $response->assertJsonPath('data',[
            [
                'id' => $produtoa->id,
                'nome' => $produtoa->nome,
                'preco' => number_format($produtoa->preco,2),
           ]
        ]);
    }

    /**
     * @test
     * @group api-cliente
     * @group produtos-search
     */
    public function test_it_should_list_search_produtos_by_preco_min()
    {
        $produtoa = factory(Produto::class)->create([
            'nome' => 'Produto a',
            'preco' => 10
        ]);
        $produtob = factory(Produto::class)->create([
            'nome' => 'Produto b',
            'preco' => 20
        ]);
        $produtoc = factory(Produto::class)->create([
            'nome' => 'Produto c',
            'preco' => 30
        ]);
        $response = $this->withoutExceptionHandling()->getJson('/api/search/produtos?preco_min=30');
        $response->assertStatus(200);
        $response->assertJsonPath('data',[
            [
                'id' => $produtoc->id,
                'nome' => $produtoc->nome,
                'preco' => number_format($produtoc->preco,2),
            ]
        ]);
    }
    /**
     * @test
     * @group api-cliente
     * @group produtos-search
     */
    public function test_it_should_list_search_produtos_by_preco_max()
    {
        $produtoa = factory(Produto::class)->create([
            'nome' => 'Produto a',
            'preco' => 10
        ]);
        $produtob = factory(Produto::class)->create([
            'nome' => 'Produto b',
            'preco' => 20
        ]);
        $produtoc = factory(Produto::class)->create([
            'nome' => 'Produto c',
            'preco' => 30
        ]);
        $response = $this->getJson('/api/search/produtos?preco_max=10');
        $response->assertStatus(200);
        $response->assertJsonPath('data',[
            [
                'id' => $produtoa->id,
                'nome' => $produtoa->nome,
                'preco' => number_format($produtoa->preco,2),
            ]
        ]);
    }
    /**
     * @test
     * @group api-cliente
     * @group produtos-search
     */
    public function test_it_should_list_search_produtos_by_preco_min_and_preco_max()
    {
        $produtoa = factory(Produto::class)->create([
            'nome' => 'Produto a',
            'preco' => 20
        ]);
        $produtob = factory(Produto::class)->create([
            'nome' => 'Produto b',
            'preco' => 25
        ]);
        $produtoc = factory(Produto::class)->create([
            'nome' => 'Produto c',
            'preco' => 30
        ]);
        $response = $this->getJson('/api/search/produtos?preco_min=21&preco_max=25');
        $response->assertStatus(200);
        $response->assertJsonPath('data',[
            [
                'id' => $produtob->id,
                'nome' => $produtob->nome,
                'preco' => number_format($produtob->preco,2),
            ]
        ]);
    }
}
