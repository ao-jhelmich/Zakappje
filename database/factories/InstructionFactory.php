<?php

use Faker\Generator as Faker;
use App\Model\Book\Instructions;

$factory->define(Instructions::class, function (Faker $faker) {
    return [
        'instructions_name' => $faker->name,
        'instructions_desc' => $faker->paragraph(),
        'flag' => 1,
    ];
});
