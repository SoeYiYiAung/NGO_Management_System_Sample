<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Staff::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'mobile' => '123-456-7890',
            'joinedDate' => '2021-01-15',
            'depId' => 1, // HR
            'position' => 'Manager',
            'age' => '35',
            'gendar' => 'Male',
            'status' => 'Active'
        ]);

        Staff::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'mobile' => '987-654-3210',
            'joinedDate' => '2020-05-20',
            'depId' => 2, // IT
            'position' => 'Developer',
            'age' => '29',
            'gendar' => 'Female',
            'status' => 'Active'
        ]);

        Staff::create([
            'name' => 'Robert Johnson',
            'email' => 'robert.johnson@example.com',
            'mobile' => '555-123-4567',
            'joinedDate' => '2019-03-10',
            'depId' => 3, //Finance
            'position' => 'Analyst',
            'age' => '42',
            'gendar' => 'Male',
            'status' => 'Active'
        ]);
    }
}
