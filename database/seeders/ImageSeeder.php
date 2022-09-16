<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Images;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Images::create([
            'title'    => 'banner2',
            'gallery_id'    => '2',
            'path'    => 'banner-2.jpg',
        ]);
    }
}
