<?php

use Faker\Generator as Faker;

$factory->define(App\Mosque::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'address' => $faker->address(),
        'date_construction' => $faker->date(),
        'street' => $faker->address(),
    ];
});
