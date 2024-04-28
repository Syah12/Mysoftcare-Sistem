<?php

namespace Database\Seeders;

use App\Models\CompanyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyStatus::create([
            'flag' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
