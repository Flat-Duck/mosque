<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'start_time' => $faker->time(),
        'end_time' => $faker->time(),
        'level_id' => function () {
            return factory(App\Level::class)->create()->id;
        },
    ];
});
