<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create([
            'name' => 'admin',
            'label' => 'Administrator',
            'flag' => 'admin'
        ]);

        Role::create([
            'name' => 'manager',
            'label' => 'Manager',
            'flag' => 'manager'
        ]);

        Role::create([
            'name' => 'user',
            'label' => 'User',
            'flag' => 'user'
        ]);
    }
}
