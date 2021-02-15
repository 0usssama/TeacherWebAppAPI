<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PivotSeanceStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        //
       for ($i=0; $i < 10 ; $i++) {
            # code...

          /*  DB::table('seance_student')->insert([
                'seance_id' => $faker->unique(true)->numberBetween($min = 1, $max = 29),
                'student_id' => $faker->unique(true)->numberBetween($min = 1, $max = 29)

            ]);*/
       }
    }
}
