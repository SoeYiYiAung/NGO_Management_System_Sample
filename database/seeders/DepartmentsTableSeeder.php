<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        Department::create([
            'name' => 'HR',
            'label' => 'Human Resources',
            'flag' => 'hr_flag'
        ]);
        Department::create([
            'name' => 'IT',
            'label' => 'Information Technology',
            'flag' => 'it_flag'
        ]);
        Department::create([
            'name' => 'Finance',
            'label' => 'Finance Department',
            'flag' => 'finance_flag'
        ]);
    }
}
