<?php

namespace Database\Seeders;

use App\Models\Tips;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tips::create([
            'article_id' => 1,
            'content' => 'odmfgkoahsg',
            'author' => 'ehab',
        ]);
        Tips::create([
            'article_id' => 1,
            'content' => 'odmfgkoahsg',
            'author' => 'ehab',
        ]);
        Tips::create([
            'article_id' => 1,
            'content' => 'odmfgkoahsg',
            'author' => 'ehab',
        ]);
    }
}
