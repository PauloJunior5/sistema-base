<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'tipo' => $faker->boolean,
        'cliente' => $faker->name,
        'apelido' => $faker->name,
        'estado_civil' => $faker->boolean,
        'endereco' => $faker->streetName,
        'numero' => $faker->uuid,
        'complemento' => $faker->sentence,
        'bairro' => $faker->streetAddress,
        'cep' => $faker->uuid,
        'cidade' => $faker->city,
        'telefone' => $faker->phoneNumber,
        'email' => $faker->email,
        'sexo' => $faker->boolean,
        'nacionalidade' => $faker->country,
        'aniversario' => $faker->date,
        'cpf' => $faker->uuid,
        'rg' => $faker->uuid,
        'emissor' => $faker->stateAbbr,
        'uf' => $faker->stateAbbr,
        'observacao' => $faker->sentence,
        // 'limite_credito' => $faker->null,
        'condicao_pagamento' => $faker->boolean,
    ];
});
