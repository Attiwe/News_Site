<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Authorization;

class RoleSeed extends Seeder
{
     
    public function run(): void
    {
        DB::table('authorizations')->truncate();

     $permissions = array_keys(config('Authorization.permissions', [])); //foreach permissions
   
  
        Authorization::create([
            'role' => 'admin',
            'permissions' =>  $permissions
        ]);
    }
    


}
