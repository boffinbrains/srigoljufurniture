<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'company'    => 'banner2',
            'contact_person'    => 'banner-2',
            'phone_number' => 'this is text',
            'mobile_number' => 'this is text',
            'email' => 'this is text',
            'address' => 'this is text',
            'contact_person_address' => 'this is text',
            'birthday' => 'this is text',
            'anniversary' => 'this is text',
            'profession' => 'this is text',
        ]);
    }
}
