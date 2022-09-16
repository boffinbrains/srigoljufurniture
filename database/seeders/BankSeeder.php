<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'title'    => 'banner2',
            'name'    => 'sgfi',
            'number' => "3534",
            'ifsc_code' => "4564fg"
        ]);
    }
}
