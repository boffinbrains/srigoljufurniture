<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Permission::create([
            'title'    => 'banner2',
            'name'    => 'banner',
            'description'    => 'text',
        ]);
    }
}
