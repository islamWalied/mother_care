<?php

namespace Database\Seeders;

use App\Models\baby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BabySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        baby::create([
            'name' => 'ehab',
            'gender' => 'male',
            'mom_id' => 1,
            'date_of_birth' => fake()->date,
        ]);
        baby::create([
            'name' => 'amera',
            'gender' => 'female',
            'mom_id' => 2,
            'date_of_birth' => fake()->date,
        ]);
        baby::create([
            'name' => 'amera',
            'gender' => 'female',
            'mom_id' => 1,
            'date_of_birth' => fake()->date,
        ]);
        baby::create([
            'name' => 'amera',
            'gender' => 'female',
            'mom_id' => 3,
            'date_of_birth' => fake()->date,
        ]);
        baby::create([
            'name' => 'amera',
            'gender' => 'female',
            'mom_id' => 2,
            'date_of_birth' => fake()->date,
        ]);
        baby::create([
            'name' => 'amera',
            'gender' => 'female',
            'mom_id' => 1,
            'date_of_birth' => fake()->date,
        ]);
    }
}
