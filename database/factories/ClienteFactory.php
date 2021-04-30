<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Cliente::class, function (Faker $faker) {
    return [
        'tipo' => $faker->boolean,
        'cliente' => $faker->name,
        'apelido' => $faker->name,
        'endereco' => $faker->streetName,
        'numero' => $faker->uuid,
        'complemento' => $faker->sentence,
        'bairro' => $faker->streetAddress,
        'cep' => $faker->uuid,
        'id_cidade' => random_int(1, 100),
        'telefone' => $faker->phoneNumber,
        'celular' => $faker->phoneNumber,
        'email' => $faker->email,
        'nacionalidade' => $faker->country,
        'cpf' => $faker->uuid,
        'rg' => $faker->uuid,
        'nascimento' => $faker->date,
        'inscricao_estadual' => $faker->uuid,
        'observacao' => $faker->text,
        'limite_credito' => $faker->randomFloat(2,100,10000),
        'condicao_pagamento' => $faker->boolean,
        'created_at' => now(),
        'updated_at' => now()
    ];
});