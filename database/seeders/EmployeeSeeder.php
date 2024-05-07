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
        $maleNames = ['Ahmad', 'Mohammad', 'Hafiz', 'Syafiq', 'Aziz', 'Farhan', 'Razak'];
        $femaleNames = ['Noraini', 'Siti', 'Aisyah', 'Norhayati', 'Nurul', 'Siti Aminah', 'Nurul Huda'];

        $names = array_merge($maleNames, $femaleNames);

        collect($names)->each(function ($name) use ($maleNames) {
            $gender = in_array($name, $maleNames) ? 'Lelaki' : 'Perempuan';
            $birthDate = Carbon::now()->subYears(rand(18, 40))->subDays(rand(0, 365));
            $phoneNumber = "013-" . rand(1000000, 9999999);
            $colors = $this->generateRandomColors(30);

            Employee::create([
                'user_id' => null,
                'name' => $name,
                'birth_date' => $birthDate,
                'phone_number' => $phoneNumber,
                'email' => strtolower($name) . '@gmail.com', // Using lowercased name for email
                'gender' => $gender,
                'image' => null,
                'position' => Arr::random(['Developer', 'CEO', 'Head Developer']),
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
