<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Seed a default admin account.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'full_name' => 'Administrator',
                'email' => 'admin@simakopi.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'phone_number' => '081234567890',
            ]
        );
    }
}
