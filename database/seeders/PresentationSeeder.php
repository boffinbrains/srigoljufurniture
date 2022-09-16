<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presentation;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentation::create([
            'title'    => 'Vedant Tamta',
            'type'    => 'v@t.com',
            'image'    => 'v@t.com',
            'video'    => 'v@t.com',
        ]);
    }
}
