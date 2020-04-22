<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'capacity' => $faker->randomDigitNotNull(),
        'floor' => $faker->numberBetween(1, 2),
        'mosque_id' => function () {
            return factory(App\Mosque::class)->create()->id;
        },
    ];
});
