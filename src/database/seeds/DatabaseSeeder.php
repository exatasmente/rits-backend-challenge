<?php

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $produtos = factory(Produto::class,100)->create();
        $pedidos = factory(Pedido::class,100)->create();
        $pedidos->each(function($pedido) use($produtos){
            $produtoPedido = $produtos->random(5)->reduce(function($actual,$produto){
                if(!array_key_exists($produto->id,$actual)){
                    $actual[$produto->id] = [
                        'quantidade' => rand(1, 4),
                    ];
                }
                return $actual;
            },[]);
            $pedido->produtos()->attach($produtoPedido);
        });
        User::create([
            'name' => 'Rits',
            'role' => 'admin',
            'email' => 'rits@backend.dev',
            'password' => bcrypt('secret'),
            'telefone' => '(88)888888888',
            'endereco' => 'Address'
        ]);


    }
}
