<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stores;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stores::create([
            'title'    => 'banner2',
            'mobile_number'    => '1234567890',
            'email'    => 'banner@gmail.com',
            'image'    => 'banner-2.jpg',
            'description'    => 'text',
        ]);
    }
}
