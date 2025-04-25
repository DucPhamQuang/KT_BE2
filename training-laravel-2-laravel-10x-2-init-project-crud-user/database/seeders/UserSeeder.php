<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        for ($i = 0; $i < 30; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password123'),
                'role' => 'admin', // Vai trò
                'orders' => fake()->numberBetween(0, 100), // Số lượng đơn hàng
            ]);
        }

        // Tạo 30 leader users
        for ($i = 0; $i < 30; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password123'),
                'role' => 'leader', // Vai trò
                'orders' => fake()->numberBetween(0, 100), // Số lượng đơn hàng
            ]);
        }

        // Tạo 30 users thông thường
        for ($i = 0; $i < 30; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password123'),
                'role' => 'user', // Vai trò
                'orders' => fake()->numberBetween(0, 100), // Số lượng đơn hàng
            ]);
        }
    }
}
