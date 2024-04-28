<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(range(1, 10))->each(function ($i) {
            $birthDate = Carbon::now()->subYears(rand(18, 40))->subDays(rand(0, 365));
            $phoneNumber = "013-" . rand(1000000, 9999999);

            Employee::create([
                'full_name' => Arr::random(['Syahmi', 'Rahman', 'Syazwan', 'Izzat', 'Amar']),
                'birth_date' => $birthDate,
                'phone_number'    => $phoneNumber,
                'gender'    => Arr::random(['Lelaki', 'Perempuan']),
                'type'    => Arr::random(['Staff', 'Intern']),
                'university'    => Arr::random(['UiTM', 'UniSZA', 'UMT']),
                'education'    => Arr::random(['Diploma', 'Degree']),
                'start_intern'    =>  now(),
                'end_intern'    =>  now(),
                'office_position'    => Arr::random(['Atas', 'Bawah']),
            ]);
        });
    }
}
