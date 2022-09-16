<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderSlip;
use App\Models\OrderSlipItem;

class OrderSlipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderSlip::create([
            'order_number' => 'SGFI210526001',
            'added_date' => '23-07-21',
            'customer_name' => 'VT',
            'customer_number' => '1234567890',
        ]);
        OrderSlipItem::create([
            'order_slip_id' => '1',
            'item_name' => 'sofa',
            'item_image' => 'default.jpg',
            'fabric' => 'cotton',
            'width' => '5ft.',
            'height' => '6ft.',
        ]);
    }
}
