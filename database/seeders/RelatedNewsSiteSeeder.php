<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  
use App\Models\RelatedNewsSite;


class RelatedNewsSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('related_news_site')->delete();
        for ($i = 0; $i < 5; $i++) {
            RelatedNewsSite::create([
                'name' => fake()->sentence(1),
                'url' => fake()->url(),
            ]);
        }
    }
    
}
