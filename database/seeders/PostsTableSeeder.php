<?php

namespace Database\Seeders;


use Faker\Factory;
use App\Models\Post;
use Illuminate\Database\Seeder;
class PostsTableSeeder extends Seeder
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
            Post::create([
                
            'user_id'     => rand(1,21),
            'category_id' => rand(1,10),
            'title'       => $name,
            'slug'        => strtolower(str_replace(' ', '-', $name)),
            'image'       => $faker->imageUrl(),
            'desc'        => $faker->paragraphs(2,true),
            'status'      => 'active'
                 
                 ]);
        }
    }
}

