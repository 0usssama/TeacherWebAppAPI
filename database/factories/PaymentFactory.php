<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        //
        /**
         * 
         * price
         * observation
         * date
         * 
         */

        'price' => $faker->unique(true)->numberBetween($min = 1000, $max = 9000),
        'observation' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'paymentDate' =>  $faker->dateTime($max = 'now', $timezone = null),
        'seance_id' => $faker->unique(true)->numberBetween($min = 1, $max = 29),
        'student_id' => $faker->unique(true)->numberBetween($min = 1, $max = 29)


    ];
});
