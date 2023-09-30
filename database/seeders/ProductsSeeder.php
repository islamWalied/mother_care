<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Products::create([
            'title' => fake()->name,
            'description' => fake()->text,
            'price' => '32',
            'pay_id' => 1,
            'customer_reviews' => "my review that this product deserves buying",
            'image' => "this is image but not supported by api yet",
        ]);
        Products::create([
            'title' => fake()->name,
            'description' => fake()->text,
            'price' => '32',
            'pay_id' => 1,
            'customer_reviews' => "my review that this product deserves buying",
            'image' => "this is image but not supported by api yet",
        ]);
        Products::create([
            'title' => fake()->name,
            'description' => fake()->text,
            'price' => '32',
            'pay_id' => 1,
            'customer_reviews' => "my review that this product deserves buying",
            'image' => "this is image but not supported by api yet",
        ]);
        Products::create([
            'title' => fake()->name,
            'description' => fake()->text,
            'price' => '32',
            'pay_id' => 1,
            'customer_reviews' => "my review that this product deserves buying",
            'image' => "this is image but not supported by api yet",
        ]);
        Products::create([
            'title' => fake()->name,
            'description' => fake()->text,
            'price' => '32',
            'pay_id' => 1,
            'customer_reviews' => "my review that this product deserves buying",
            'image' => "this is image but not supported by api yet",
        ]);
    }
}
