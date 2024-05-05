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
        $atasDuties = [
            'Section A', 'Section B', 'Cermin + Partition', 'Meja Meeting',
            'Sampah', 'Toilet', 'Surau', 'Tangga', 'Filter', 'Mop Section A', 'Mop Section B'
        ];
        $bawahDuties = [
            'Section A', 'Section B', 'Cermin', 'Meja', 'Sampah', 'Toilet',
            'Mop Section A', 'Mop Section B', 'Filter'
        ];

        foreach ($atasDuties as $duty) {
            Duty::create([
                'name' => $duty,
                'gender' => Arr::random(['Lelaki', 'Perempuan', 'Lelaki & Perempuan']),
                'office_position' => 'Atas',
            ]);
        }
        foreach ($bawahDuties as $duty) {
            Duty::create([
                'name' => $duty,
                'gender' => Arr::random(['Lelaki', 'Perempuan', 'Lelaki & Perempuan']),
                'office_position' => 'Bawah',
            ]);
        }
    }
}
