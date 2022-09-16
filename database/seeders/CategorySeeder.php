<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title'    => 'banner 1',
            'slug'    => 'banner-1',
            'thumbnail'    => 'banner-1.jpg',
        ]);
    }
}
