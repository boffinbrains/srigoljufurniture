<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id'    => '1',
            'title'    => 'product 1',
            'slug'    => 'product-1',
            'color'    => 'red',
            'brief_description'    => 'Lorem Ipsum is a dummy text generator',
            'thumbnail'    => 'thumb-1.jpg',
            'image'    => 'product-1.jpg',
            'featured'    => true,
        ]);
    }
}
