<?php

namespace Database\Seeders;

use App\Models\Payments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payments::create([
            'mom_id' => 1,
            'total_price' => 231,
            'card_cvv' => 32,
            'date_time' => now(),
            'card_expiry' => 1,
            'card_number' => 256,
        ]);
        Payments::create([
            'mom_id' => 1,
            'total_price' => 231,
            'card_cvv' => 32,
            'date_time' => now(),
            'card_expiry' => 1,
            'card_number' => 256,
        ]);
        Payments::create([
            'mom_id' => 1,
            'total_price' => 231,
            'card_cvv' => 32,
            'date_time' => now(),
            'card_expiry' => 1,
            'card_number' => 256,
        ]);
        Payments::create([
            'mom_id' => 1,
            'total_price' => 231,
            'card_cvv' => 32,
            'date_time' => now(),
            'card_expiry' => 1,
            'card_number' => 256,
        ]);
    }
}
