<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'national_number' => $faker->randomDigitNotNull(),
        'name' => $faker->name(),
        'date_birth' => $faker->date(),
        'address' => $faker->address(),
        'phone' => $faker->phoneNumber(),
        'qualification' => $faker->name(),
        'notes' => $faker->paragraph(),
        'passport' => $faker->name(),
        'nationality_id' => function () {
            return factory(App\Nationality::class)->create()->id;
        },
        'gender_id' => function () {
            return factory(App\Gender::class)->create()->id;
        },
        'status_id' => function () {
            return factory(App\Status::class)->create()->id;
        },
        'level_id' => function () {
            return factory(App\Level::class)->create()->id;
        },
    ];
});