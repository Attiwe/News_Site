<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
         User::factory(10)->create();

         $this->call([
            CategorySeeder::class,
            RelatedNewsSiteSeeder::class,
        ]);

        $posts =  Post::factory(20)->create();
        $posts->each(function($post){
            Image::factory(2)->create([
                'post_id'=>$post->id
            ]);
        });
       
        Comment::factory()->count(20)->create();
        
    }
}
