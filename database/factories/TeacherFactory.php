<?php

use Faker\Generator as Faker;

$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'date_birth' => $faker->date(),
        'family_booklet_number' => $faker->randomDigitNotNull(),
        'designation' => $faker->numberBetween(1, 3),
        'description' => $faker->numberBetween(1, 3),
        'date_designation' => $faker->date(),
        'address' => $faker->address(),
        'bank' => $faker->name(),
        'branch' => $faker->name(),
        'account' => $faker->name(),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->safeEmail(),
        'certificate' => $faker->numberBetween(1, 5),
        'date_certificate' => $faker->date(),
        'certificate_place' => $faker->name(),
        'national_number' => $faker->randomDigitNotNull(),
        'mosque_id' => function () {
            return factory(App\Mosque::class)->create()->id;
        },
        'nationality_id' => $faker->numberBetween(1, 5),
        'gender_id' => $faker->numberBetween(1, 2),
        // 'status_id' => function () {
        //     return factory(App\Status::class)->create()->id;
        // },
    ];
});
