<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Estado::class, function (Faker $faker) {
    return [
        'uf' => $faker->lexify(),
        'estado' => $faker->city,
        'id_pais' => random_int(1, 100),
        'created_at' => now(),
        'updated_at' => now()
    ];
});