<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // password
        'remember_token' => '',
        'role' => 'cliente',
        'endereco' => $faker->address,
        'telefone' => $faker->phoneNumber
    ];
});
$factory->state(User::class,'admin',[
    'role' => 'admin'
]);
$factory->state(User::class,'cliente',[
    'role' => 'cliente'
]);
