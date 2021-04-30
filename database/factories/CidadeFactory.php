<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Cidade::class, function (Faker $faker) {
    return [
        'ddd' => random_int(1, 99),
        'cidade' => $faker->city,
        'id_estado' => random_int(1, 100),
        'created_at' => now(),
        'updated_at' => now()
    ];
});