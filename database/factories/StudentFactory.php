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

        'nationality_id' => $faker->numberBetween(2, 4),
        'gender_id' => $faker->numberBetween(1, 2),
        'status_id' => function () {
            return factory(App\Status::class)->create()->id;
        },
        'level_id' => function () {
            return 1;
        },
        'mosque_id' => function () {
            return factory(App\Mosque::class)->create()->id;
        },
        'course_id' => function () {
            return factory(App\Course::class)->create()->id;
        },
    ];
});
