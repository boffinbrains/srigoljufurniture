<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quotation;
use App\Models\QuotationItem;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quotation::create([
            'reference_number'    => 'SGFI210526001',
            'client_name' => "Boffin Brains",
            'price_type' => "mrp",
            'sub_total' => "1600",
            'grand_total' => "1600",
            'discount' => "0",
            'discount_type' => "all",
            'sector' => "non-government",
            'terms_and_conditions' => "<ul><li>50% Advance payment & rest before 2 days of delivery.</li><li>Transport ₹1200 will be extra, as actual.</li><li>Delivery period 15 days receive of p.o date.</li><li>G.S.T will be extra, as actual.</li></ul>",
            'bank_id' => "1",
            'made_by' => "1",
            'added_date' => "23-07-21",
        ]);
        QuotationItem::create([
            'quotation_id'    => '1',
            'name'    => 'VT',
            'description' => "Dummy Text",
            'image' => "vt.jpg",
            'quantity' => "2",
            'color' => "red",
            'item_discount' => "0",
            'unit_price' => "1000",
            'rate' => "800",
            'discounted_total' => "1600",
        ]);
    }
}