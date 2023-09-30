<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Payments;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(Admin::class);
        $this->call(BabySeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(TipsSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(ProductsSeeder::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
