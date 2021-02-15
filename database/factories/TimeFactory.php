<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Time;
use Faker\Generator as Faker;

$factory->define(Time::class, function (Faker $faker) {
    return [
        //
        /**
         * type
         * date
         * seance_id
         */
      //  'type' => $faker->randomElement($array = ['1P', '2P', '3P', '4P', '1A', '2A', '3A', '4A']),
      //  'validationDate' => null,
      /*  'seance_id' => $faker->unique(true)->numberBetween($min = 1, $max = 29),
        'student_id' => $faker->unique(true)->numberBetween($min = 1, $max = 29)
*/
    ];
});
