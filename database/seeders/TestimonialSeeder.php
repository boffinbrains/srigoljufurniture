<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonials;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonials::create([
            'name'    => 'banner2',
            'display_picture'    => 'banner-2.jpg',
            'description' => 'this is text'
        ]);
    }
}
