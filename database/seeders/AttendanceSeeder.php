<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Amir', 'Alya', 'Haziq', 'Siti', 'Ahmad', 'Nurul', 'Imran', 'Nadia', 'Firdaus', 'Nor',
            'Aziz', 'Sofia', 'Syafiq', 'Zainab', 'Aiman', 'Farah', 'Izzat', 'Aishah', 'Haris', 'Rina',
            'Danial', 'Zara', 'Akmal', 'Amira', 'Hakim', 'Azlina', 'Asyraf', 'Nur', 'Fahmi', 'Aina'
        ];

        collect($names)->each(function ($i) {
            $todayDate = Carbon::now();
            $employee_id = Employee::firstWhere('full_name', $i)->id;

            Attendance::create([
                'employee_id' => $employee_id,
                'date' => $todayDate,
                'is_present' => Arr::random([true, false]),
            ]);
        });
    }
}
