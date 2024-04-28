<?php

namespace Database\Seeders;

use App\Models\Duty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DutySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(['Sampah', 'Surau', 'Lantai', 'Tangga', 'Cermin'])->each(function ($i) {
            Duty::create([
                'name' => $i,
                'office_position' => Arr::random(['Atas', 'Bawah']),
            ]);
        });
    }
}
