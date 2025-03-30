<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\SystemSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemSetting::insert([
            [
                'id'             => 1,
                'title'          => 'This is a title',
                'email'          => 'mr7517218@gmail.com',
                'phone'          => '+1 3300 220 1100',
                'address'        => '2801 Wade Hampton Blvd South Carolina',
                'system_name'    => 'Logipsum',
                'copyright_text' => 'Copyright © Logipsum Limited. All rights reserved',
                'logo'           => 'backend/assets/images/logo.svg',
                'favicon'        => 'backend/assets/images/logo.svg',
                'description'    => null,
                'created_at'     => Carbon::now(),
            ],
        ]);
    }
}
