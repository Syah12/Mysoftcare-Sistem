<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(range(1, 20))->each(function ($i) {

            Agency::create([
                'name' => 'Agensi ' . $i,
                'phone_number' => '013' . $i,
                'email' => $i . '@gmail.com',
                'address' => 'Alamat ' . $i,
                'state' => 'Negeri ' . $i,
                'district' => 'Daerah ' . $i,
                'country' => 'Negara ' . $i,
                'postcode' => $i
            ]);
        });
    }
}
