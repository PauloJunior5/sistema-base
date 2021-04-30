<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Pais::class, function (Faker $faker) {
    return [
        'sigla' => $faker->lexify(),
        'pais' => $faker->country,
        'created_at' => now(),
        'updated_at' => now()
    ];
});