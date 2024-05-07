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
        $maleNames = ['Danial', 'Akmal', 'Hakim', 'Asyraf', 'Fahmi'];
        $femaleNames = ['Zara', 'Amira', 'Azlina', 'Nur', 'Aina', 'Nora'];

        $names = array_merge($maleNames, $femaleNames);

        collect($names)->each(function ($name) use ($maleNames) {
            $gender = in_array($name, $maleNames) ? 'Lelaki' : 'Perempuan';
            $ic = rand(0, 999999) . "-" . rand(0, 99)  . "-" . rand(0, 9999);
            $phone_number = "013-" . rand(0, 9999999);
            $colors = $this->generateRandomColors(30);
            $skills = ['Python', 'Laravel', 'MySQL'];
            $educational_level = [
                [
                    'year' => '2024',
                    'educational_level' => 'PT3',
                    'institution' => 'SMK',
                ],
                [
                    'year' => '2024',
                    'educational_level' => 'SPM',
                    'institution' => 'SMK',
                ]
            ];

            Intern::create([
                'user_id' => null,
                'name' => $name,
                'ic' => $ic,
                'email' => strtolower(str_replace(' ', '_', $name)) . '@gmail.com', // Using lowercased name for email
                'phone_number' => $phone_number,
                'letter' => null,
                'educational_level' => $educational_level,
                'skills' => $skills,
                'university'    => Arr::random(['UiTM', 'UniSZA', 'UMT']),
                'gender'    => $gender,
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
