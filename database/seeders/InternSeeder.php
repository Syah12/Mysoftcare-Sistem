<?php

namespace Database\Seeders;

use App\Models\Intern;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class InternSeeder extends Seeder
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
            $ic = rand(0, 999999) . "-" . rand(0, 99)  . "-" . rand(0, 9999);
            $phone_number = "013-" . rand(0, 9999999);
            $colors = $this->generateRandomColors(30);
            $skills = ['Python', 'Laravel', 'MySQL'];

            Intern::create([
                'user_id' => null,
                'name' => $i,
                'ic' => $ic,
                'email' => $i . '@gmail.com',
                'phone_number' => $phone_number,
                'letter' => null,
                'year' => Arr::random([1, 2, 3]),
                'educational_level' => Arr::random(['Diploma', 'Degree']),
                'institutions' => Arr::random(['Sekolah', 'Universiti']),
                'skills' => $skills,
                'university'    => Arr::random(['UiTM', 'UniSZA', 'UMT']),
                'training_period' => Arr::random([6, 7, 8]),
                'start_intern'    =>  now(),
                'end_intern'    =>  now(),
                'image' => null,
                'resume' => null,
                'status' => Arr::random(['Diterima', 'Ditolak', 'Aktif', 'Tamat']),
                'office_position'    => Arr::random(['Atas', 'Bawah']),
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
