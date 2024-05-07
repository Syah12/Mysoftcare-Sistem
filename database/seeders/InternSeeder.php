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
            'Intern Danial', 'Intern Zara', 'Intern Akmal', 'Intern Amira', 'Intern Hakim', 'Intern Azlina', 'Intern Asyraf', 'Intern Nur', 'Intern Fahmi', 'Intern Aina'
        ];

        collect($names)->each(function ($i) {
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
                'name' => $i,
                'ic' => $ic,
                'email' => $i . '@gmail.com',
                'phone_number' => $phone_number,
                'letter' => null,
                'educational_level' => $educational_level,
                'skills' => $skills,
                'university'    => Arr::random(['UiTM', 'UniSZA', 'UMT']),
                'gender'    => Arr::random(['Lelaki', 'Perempuan']),
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
