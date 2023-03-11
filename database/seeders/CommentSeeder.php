<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            Comment::create([
                'post_id' => Post::all()->random(1)->first()->id,
                'title' => fake()->title(),
                'content' => fake()->paragraph(2)
            ]);
        }  
    }
}
