<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(User::class, 10)->create();
        DB::table('users')->insert([
            'first_name' => 'Bahlouli',
            'last_name'=> 'Hamza',
            'email' => 'hamza7-illidan@hotmail.com',
            'password' => Hash::make('justapassword'),
        ]);
    }
}
