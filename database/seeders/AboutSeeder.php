<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title'    => 'banner2',
            'image'    => 'banner-2.jpg',
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
            'brief_description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."
        ]);
    }
}