<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Str;
 
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->delete();
        $categories = ['Food categories','Sport categories','Travel categories', 'Techology categories'];
        foreach($categories as $item){
           Category::create([
            'name'=>$item,
            'slug'=> Str::slug($item),
            'status'=> 1,
           ]);
        }
    }
}
