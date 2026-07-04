<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Customer::create([
            'customer_name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 'active',
        ]);

        \App\Models\Category::create([
            'category_name' => 'Sofa',
            'description' => 'Living room sofas',
        ]);

        \App\Models\Furniture::create([
            'category_id' => 1,
            'furniture_name' => 'Modern Sofa',
            'sku' => 'SOFA123',
            'price' => 500.00,
            'stock_quantity' => 10,
            'status' => 'active',
        ]);

        \App\Models\Favorite::create([
            'customer_id' => 1,
            'furniture_id' => 1,
        ]);
    }
}
