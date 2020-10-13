<?php

use Faker\Generator as Faker;

$factory->define(App\Exam::class, function (Faker $faker) {
    return [
        'date' => $faker->date(),
        'save' => $faker->randomFloat(2, 0, 99),
        'applied_rules' => $faker->randomFloat(2, 0, 99),
        'drawing' => $faker->randomFloat(2, 0, 99),
        'pronunciation' => $faker->randomFloat(2, 0, 99),
        'student_id' => function () {
            return factory(App\Student::class)->create()->id;
        },
        'teacher_id' => function () {
            return factory(App\Teacher::class)->create()->id;
        },
        'level_id' => function () {
            return 1;
        },
    ];
});
