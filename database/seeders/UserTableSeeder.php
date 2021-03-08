<?php

namespace Database\Seeders;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker =Factory::create();
       $this->defaultUser();

       foreach(range(1,20) as $index){
            User::create([

                'name' => $faker-> name,
                'email'=>  $faker-> email,
                'password' => bcrypt($faker->password),
                
                ]);


       }


    }

    public function defaultUser(){


        User::create([

            'name' => 'Admin',
            'email'=>  'admin@gmail.com',
            'password' => bcrypt('1234')
            
            ]);


    }
}
