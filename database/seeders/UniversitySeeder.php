<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(range(1, 20))->each(function ($i) {

            University::create([
                'name' => 'Universiti/Sekolah ' . $i,
                'phone_number' => '013' . $i,
                'email' => $i . '@gmail.com',
                'address' => 'Alamat ' . $i,
                'state' => 'Negeri ' . $i,
                'district' => 'Daerah ' . $i,
                'country' => 'Negara ' . $i,
                'postcode' => $i,
                'is_university' => Arr::random([true, false])
            ]);
        });
    }
}
