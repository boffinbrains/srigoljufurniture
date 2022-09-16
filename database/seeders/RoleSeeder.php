<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'title'    => 'Admin',
            'name'    => 'CEO',
            'description'    => 'Head of the Company',
        ]);
    }
}
