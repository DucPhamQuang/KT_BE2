<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class UserWithProductsSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(10)->create()->each(function ($user) {
            // Tạo 3-5 sản phẩm ngẫu nhiên cho mỗi user
            Product::factory(rand(3, 5))->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
