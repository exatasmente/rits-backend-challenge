<?php

namespace Tests\Feature\Api\Auth;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;
    public function setUp() : void
    {
        parent::setUp();
    }

    /**
     * @test
     * @group test
     */
    public function test_it_should_register_a_new_cliente()
    {

        $response = $this->withoutExceptionHandling()->post('/api/signup/',[
            'name' => 'Test user',
            'email' => 'email@test.com',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertSuccessful();
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('users',[
            'name' => 'Test user',
            'email' => 'email@test.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);

    }

    /**
     * @test
     * @group test
     */
    public function test_name_field_is_required()
    {

        $response = $this->post('/api/signup/',[
            'email' => 'email@test.com',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'name' => ['O Nome é obrigatório']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test user',
            'email' => 'email@test.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);

    }

    /**
     * @test
     * @group test
     */
    public function test_name_field_can_not_be_empty()
    {

        $response = $this->post('/api/signup/',[
            'name'  => '',
            'email' => 'email@test.com',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'name' => ['O Nome é obrigatório']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test user',
            'email' => 'email@test.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);

    }

    /**
     * @test
     * @group test
     */
    public function test_name_field_must_be_a_string()
    {

        $response = $this->post('/api/signup/',[
            'name'  => 123,
            'email' => 'email@test.com',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'name' => [
                'O Nome é inválido',
            ]
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test user',
            'email' => 'email@test.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);

    }

    /**
     * @test
     * @group test
     */
    public function test_name_field_must_have_a_minimum_length()
    {

        $response = $this->post('/api/signup/',[
            'name'  => 'AA',
            'email' => 'email@test.com',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'name' => [
                'O Nome precisa ter no mínimo 3 caracteres',
            ]
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test user',
            'email' => 'email@test.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);

    }

    /**
     * @test
     * @group test
     */
    public function test_email_field_is_required()
    {

        $response = $this->post('/api/signup/',[
            'name' => 'Test name',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'email' => ['O Email é obrigatório']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);
    }

    /**
     * @test
     * @group test
     */
    public function test_email_field_can_not_be_empty()
    {

        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => '',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'email' => ['O Email é obrigatório']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => '',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);

    }

    /**
     * @test
     * @group test
     */
    public function test_email_field_must_be_a_email()
    {

        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'invalid email',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'email' => ['O campo precisa ser um Email']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'invalid email',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);

    }

    /**
     * @test
     * @group test
     */
    public function test_email_should_be_unique()
    {
        $user = factory(User::class)->state('cliente')
            ->create([
                'email' => 'test@email.com'
            ]);
        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'test@email.com',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'email' => ['Email já cadastrado']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'test@email.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);
    }

    /**
     * @test
     * @group test
     */
    public function test_telefone_is_required()
    {
        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'test@email.com',
            'password' => 'password',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'telefone' => ['O Telefone é obrigatório']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'test@email.com',
            'endereco' => "Address line 1 \n address line 2",
        ]);
    }

    /**
     * @test
     * @group test
     */
    public function test_telefone_can_not_be_empty()
    {
        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'test@email.com',
            'password' => 'password',
            'telefone' => '',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'telefone' => ['O Telefone é obrigatório']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'test@email.com',
            'endereco' => "Address line 1 \n address line 2",
        ]);
    }
    /**
     * @test
     * @group test
     */
    public function test_telefone_must_be_unique()
    {
        $user = factory(User::class)->state('cliente')->create([
            'telefone' => '(88)888888888'
        ]);
        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'test@email.com',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'telefone' => ['Telefone já cadastrado']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'test@email.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);
    }

    /**
     * @test
     * @group test
     */
    public function test_telefone_must_be_a_valid_phone_number()
    {
        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'test@email.com',
            'password' => 'password',
            'telefone' => 'invalid phone',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'telefone' => ['O Telefone é inválido']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'test@email.com',
            'telefone' => 'invalid phone',
            'endereco' => "Address line 1 \n address line 2",
        ]);
    }
    /**
     * @test
     * @group test
     */
    public function test_password_field_is_required()
    {
        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'test@email.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'password' => ['A Senha é obrigatória']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'test@email.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);
    }
    /**
     * @test
     * @group test
     */
    public function test_password_field_can_not_be_empty()
    {
        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'test@email.com',
            'password' => '',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'password' => ['A Senha é obrigatória']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'test@email.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);
    }
    /**
     * @test
     * @group test
     */
    public function test_password_field_must_have_a_minimum_length()
    {
        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'test@email.com',
            'password' => 'just4',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'password' => ['A Senha precisa ter no mínimo 6 caracteres']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'test@email.com',
            'telefone' => '(88)888888888',
            'endereco' => "Address line 1 \n address line 2",
        ]);
    }

    /**
     * @test
     * @group test
     */
    public function test_endereco_field_is_required()
    {
        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'test@email.com',
            'password' => 'password',
            'telefone' => '(88)888888888',
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'endereco' => ['O Endereço é obrigatório']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'test@email.com',
            'telefone' => '(88)888888888',
        ]);
    }
    /**
     * @test
     * @group test
     */
    public function test_endereco_can_not_be_empty()
    {
        $response = $this->post('/api/signup/',[
            'name'  => 'Test name',
            'email' => 'test@email.com',
            'password' => 'password',
            'telefone' => '(88)888888888',
            'endereco' => ''
        ],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(422);
        $response->assertJsonPath('errors',[
            'endereco' => ['O Endereço é obrigatório']
        ]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Test name',
            'email' => 'test@email.com',
            'telefone' => '(88)888888888',
        ]);
    }
}
