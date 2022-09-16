<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brands;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brands::create([
            'title'    => 'banner2',
            'image'    => 'banner-2.jpg',
        ]);
    }
}
