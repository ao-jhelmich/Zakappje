<?php

use Faker\Generator as Faker;
use App\Model\Book\mainrequirements;

$factory->define(mainrequirements::class, function (Faker $faker) {
    return [
        'mainrequirements_name' => $faker->name,
        'mainrequirements_description' => $faker->paragraph(),
        'flag' => 1,
    ];
});
