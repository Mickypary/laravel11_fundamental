<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = [
            ['id' => 1, 'title' => 'Post Title 1', 'description' => '', 'photo' => '',],
            ['id' => 2, 'title' => 'Post Title 2', 'description' => '', 'photo' => '',],
            ['id' => 3, 'title' => 'Post Title 3', 'description' => '', 'photo' => '',],
        ];

        Post::insert($post);
    }
}
