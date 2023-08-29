<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Events::create([
            'title' => 'mom',
            'description' => 'odmfgkoahsg',
            'location' => 'cairo',
            'date_time' => now(),
            'organizer' => 'ehab',
        ]);
        Events::create([
            'title' => 'mom',
            'description' => 'odmfgkoahsg',
            'location' => 'cairo',
            'date_time' => now(),
            'organizer' => 'ehab',
        ]);
        Events::create([
            'title' => 'mom',
            'description' => 'odmfgkoahsg',
            'location' => 'cairo',
            'date_time' => now(),
            'organizer' => 'ehab',
        ]);
    }
}
