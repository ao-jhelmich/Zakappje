<?php

use Faker\Generator as Faker;
use App\Model\Book\requirements;

$factory->define(Requirements::class, function (Faker $faker) {
    return [
        'requirements_name' => $faker->name,
        'flag' => 1,
    ];
});
