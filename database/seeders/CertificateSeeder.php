<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificates;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certificates::create([
            'title'    => 'banner2',
            'image'    => 'banner-2.jpg',
        ]);
    }
}
