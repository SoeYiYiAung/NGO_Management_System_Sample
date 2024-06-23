<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Permission::create([
            'name' => 'view_users',
            'label' => 'View Users',
            'flag' => 'users.view'
        ]);

        Permission::create([
            'name' => 'edit_users',
            'label' => 'Edit Users',
            'flag' => 'users.edit'
        ]);

        Permission::create([
            'name' => 'delete_users',
            'label' => 'Delete Users',
            'flag' => 'users.delete'
        ]);
    }
}
