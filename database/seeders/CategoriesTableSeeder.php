<?php

namespace Database\Seeders;
use Faker\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        
        $faker =Factory::create();
        // $this->defaultUser();
       
 
        foreach (range(1, 20) as $index) {
            $name=$faker->name;
            Category::create([
                
                'user_id' => rand(1, 21),
                 'name' => $name,
                 'slug' => strtolower(str_replace(' ', '-', $name)),
                 'status' =>$this->randstatus()
                 
                 ]);
        }

    }

    private function randstatus(){

     $status=[
    'active'=>'active',
    'inactive'=> 'inactive'
     ];
     return array_rand($status);

    }



}
