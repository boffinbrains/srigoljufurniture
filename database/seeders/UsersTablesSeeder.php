<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use Illuminate\Support\Str;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'Vedant Tamta',
            'email'    => 'v@t.com',
            'mobile_number'    => '1234567890',
            'password'   =>  Hash::make('123'),
            'role' =>  1,
        ]);
    }
}
