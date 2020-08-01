<?php

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $produtos = factory(Produto::class,100)->create();
        $pedidos = factory(Pedido::class,100)->create();

        $pedidos->each(function($pedido) use ($produtos) {

            $pedido->produtos()->attach($produtos->random(10)->reduce(function($actual,$produto){
                $actual[$produto->id] = [
                    'quantidade' => rand(1, 4),
                    'preco_unidade' => $produto->preco
                ];
                return $actual;
            },[]));
        });


    }
}
