<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Generate 800 data karyawan dummy menggunakan EmployeeFactory.
     */
    public function run(): void
    {
        Employee::factory(800)->create();
    }
}
