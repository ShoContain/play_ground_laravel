<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @param int $user_id 
     * @return void
     */
    public function run($user_id = null)
    {
        \App\Models\Post::factory(10)->create(['user_id'=>$user_id]);
    }
}
