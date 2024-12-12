<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'phone' => '08123456789',
            'address' => fake()->address(),
            'password' => 'admin',
            'otp' => '',
            'role' => 'admin',
        ]);


        User::factory()->create([
            'name' => 'pimpinan',
            'email' => 'pimpinan@gmail.com',
            'email_verified_at' => now(),
            'phone' => '08123456789',
            'address' => fake()->address(),
            'password' => 'pimpinan',
            'otp' => '',
            'role' => 'pimpinan',
        ]);
    }
}
