<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogue;

class CatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalogue::create([
            'title'    => 'ceramic 1',
            'pdf'    => 'jti-original-1.pdf',
        ]);
    }
}
