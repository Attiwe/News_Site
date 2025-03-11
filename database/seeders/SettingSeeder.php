<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sttings')->delete();
        Setting::create([
            'stie_name' => 'News Social',
            'email' => 'info@newssocial.com',
            'favicon' => 'favicon.ico',
            'logo' => 'logo.png',
            'phone' => '+1234567890',
            'facebook' => 'https://facebook.com/newssocial',
            'linkendin' => 'https://linkedin.com/company/newssocial',
            'twitter' => 'https://twitter.com/newssocial',
            'youtube' => 'https://youtube.com/newssocial',
            'instagram' => 'https://instagram.com/newssocial',
            'country' => 'United States',
            'city' => 'New York',
            'street' => '123 News Street'
        ]);

    }
}
