<?php

namespace Database\Seeders;

use App\Models\Admin;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->delete();

        Admin::create([
        'name'=>'test',
        'username'=>'test test',
        'email'=>'admin@gmail.com',
        'status'=>1,
        'password'=>'123',
        'role_id'=>1
        ]);

    }
}
