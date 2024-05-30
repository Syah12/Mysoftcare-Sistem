<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(range(1, 20))->each(function ($i) {
            $value = [150000, 100000, 80000];
            $status = ['Berjaya', 'Aktif', 'EOT', 'Tempoh jaminan', 'Selesai'];

            Project::create([
                'agency_id' => null,
                'pic_id' => null,
                'year' => '2024',
                'name' => 'Projek ' . $i,
                'contract_guarentee' => Arr::random([6, 7, 8]),
                'start_date_contract' => now(),
                'end_date_contract' => now(),
                'contract_value' => Arr::random($value),
                'sst' => null,
                'notes' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam magnam quis placeat! Tempore soluta repudiandae magni sit quae consequuntur hic odio, corporis veritatis, inventore aperiam, voluptatibus illo nulla vero? In.',
                'creator' => 'Creator' . $i,
                'status' => Arr::random($status),
                'mileage' => null,
                'date' => null,
                'place' => null,
                'status_mileage' => null
            ]);
        });
    }
}
