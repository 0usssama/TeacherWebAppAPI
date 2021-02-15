<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seance;
use Faker\Generator as Faker;

$factory->define(Seance::class, function (Faker $faker) {
    return [
        //

        /**
         * name
         * state
         * seance_id
         * payment_id
         */
        'name' => $faker->monthName(),
        'state' => $faker->randomElement($array = array('active', 'off')),
        //'student_id' => $faker->unique(true)->numberBetween($min = 1, $max = 29),
       

    ];
});
