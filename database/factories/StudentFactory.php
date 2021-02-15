<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        //
        /**
         * firstName
         * LastName
         * PhoneNumber
         * HiringDate
         * level
         * ref
         * 
         */
        'firstName' => $faker->firstName(),
        'lastName' => $faker->lastName(),
        'phoneNumber' => $faker->phoneNumber(),
        'hiringDate' => $faker->dateTime(),
        'level' => 'undefined_level',
        'ref' => 'undefined'
    ];
});
