<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
       // $this->call(StudentSeeder::class);
       // $this->call(SeanceSeeder::class);
       // $this->call(PaymentSeeder::class);
        //$this->call(TimeSeeder::class);
       // $this->call(PivotSeanceStudentSeeder::class);

    }
}
