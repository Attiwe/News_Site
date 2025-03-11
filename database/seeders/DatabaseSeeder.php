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
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         $this->call([
            CategorySeeder::class,
            SettingSeeder::class,
        ]);
         Post::factory(10)->create();
         Comment::factory()->count(20)->create();
         Image::factory()->count(30)->create();
         
        
    }
}
