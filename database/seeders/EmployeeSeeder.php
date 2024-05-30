<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Testing\Fakes\Fake;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $names = [
            'Employee Amir', 'Employee Alya', 'Employee Haziq', 'Employee Siti', 'Employee Ahmad', 'Employee Nurul', 'Employee Imran', 'Employee Nadia', 'Employee Firdaus', 'Employee Nor'
        ];

        collect($names)->each(function ($i) {
            $birthDate = Carbon::now()->subYears(rand(18, 40))->subDays(rand(0, 365));
            $phoneNumber = "013-" . rand(1000000, 9999999);
            $colors = $this->generateRandomColors(30);

            Employee::create([
                'user_id' => null,
                'position_id' => null,
                'name' => $i,
                'birth_date' => $birthDate,
                'phone_number' => $phoneNumber,
                'email' => $i . '@gmail.com',
                'image' => null,
                'office_position' => Arr::random(['Atas', 'Bawah']),
                'colour' => array_pop($colors),
            ]);
        });
    }

    private function generateRandomColors($count)
    {
        $colors = [];

        for ($i = 0; $i < $count; $i++) {
            $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            $colors[] = $color;
        }

        return $colors;
    }
}
