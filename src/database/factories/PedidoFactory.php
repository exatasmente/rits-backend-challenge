<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Pedido;
use Faker\Generator as Faker;

$factory->define(Pedido::class, function (Faker $faker) {
    $status = $faker->randomElement([Pedido::PENDENTE, Pedido::EM_PREPARO,Pedido::EM_ENTREGA,Pedido::ENTREGUE,Pedido::CANCELADO]);
    return [
        'user_id' => factory(User::class)->state('cliente')->create()->id,
        'status' => $status
    ];
});
$factory->state(Pedido::class,'pendente',[
    'status' => Pedido::PENDENTE
]);
$factory->state(Pedido::class,'em_preparo',[
    'status' => Pedido::EM_PREPARO
]);
$factory->state(Pedido::class,'em_entrega',[
    'status' => Pedido::EM_ENTREGA
]);
$factory->state(Pedido::class,'entregue',[
    'status' => Pedido::ENTREGUE
]);
$factory->state(Pedido::class,'cancelado',[
    'status' => Pedido::CANCELADO
]);
