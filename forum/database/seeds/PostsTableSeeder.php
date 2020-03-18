<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i <= 25; $i++){
            $faker = Faker::create();
            Post::create([
            'title' => $faker->sentence,
            'description' => $faker->sentence,
            'views' => $faker->randomDigit,
            'user_id' => 3, 
            ]);
        }
    }
}
