<?php

namespace Database\Seeders;

use App\Models\PIC;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PICSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'PIC Amir', 'PIC Alya', 'PIC Haziq', 'PIC Siti', 'PIC Ahmad', 'PIC Nurul', 'PIC Imran', 'PIC Nadia', 'PIC Firdaus', 'PIC Nor'
        ];

        collect($names)->each(function ($i) {
            $phoneNumber = "013-" . rand(1000000, 9999999);

            PIC::create([
                'agency_id' => Arr::random(range(1, 5)),
                'position_id' => Arr::random(range(1, 5)),
                'name' => $i,
                'phone_number' => $phoneNumber
            ]);
        });
    }
}
