<?php


namespace Tests\Feature\Api\Middleware;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ClienteApiMiddlewareTest extends TestCase
{
    use RefreshDatabase;
    public function setUp() : void
    {
        parent::setUp();
        Route::middleware('auth.api')->get('/test', function () {
            return 'ok';
        });
    }

    /** @test
     * @group api-middleware
     */
    public function test_it_should_authenticate_a_cliente(){
        $cliente = factory(User::class)->state('cliente')->create();
        $response = $this->get('/test?cliente_id=1',[
            'accept' => 'application/json'
        ]);
        $response->assertSuccessful();
        $response->assertSee('ok');
        $this->assertEquals(Auth::user()->id,$cliente->id);

    }
    /** @test
     * @group api-middleware
     */
    public function test_it_should_not_authenticate_a_cliente(){
        $response = $this->get('/test',[
            'accept' => 'application/json'
        ]);
        $response->assertStatus(403);
        $response->assertJson([
            'error' => 'Cliente inválido, forneça um cliente'
        ]);
        $this->assertTrue(Auth::user() == null);

    }

    /** @test
     * @group api-middleware
     */
    public function test_it_should_not_authenticate_a_invalid_cliente(){

        $response = $this->get('/test?cliente_id=10000',[
            'accept' => 'application/json'
        ]);
        $response->assertStatus(404);
        $response->assertJson([
            'error' => 'not found'
        ]);
        $this->assertTrue(Auth::user() == null);

    }
}
