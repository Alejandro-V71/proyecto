<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([

            'name' => 'samuel casallas',
            'email'=> 'samuel@gmail.com',
            'password' => bcrypt('Cs123456')
        ])->assignRole('Asesor');


        User::create([

            'name' => 'laura',
            'email'=> 'laural@gmail.com',
            'password' => bcrypt('Cs123456')
        ])->assignRole('Asesor');


        User::create([

            'name' => 'diego',
            'email'=> 'diego@gmail.com',
            'password' => bcrypt('Cs123456')
        ])->assignRole('Cliente');
    }
}
