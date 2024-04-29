<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('pswd123')
        ])->assignRole(config('mysoftcare.roles.admin'));

        User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('pswd123')
        ])->assignRole(config('mysoftcare.roles.staff'));

        User::factory()->create([
            'name' => 'Intern',
            'email' => 'intern@gmail.com',
            'password' => Hash::make('pswd123')
        ])->assignRole(config('mysoftcare.roles.intern'));
    }
}
