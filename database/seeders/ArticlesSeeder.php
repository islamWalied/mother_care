<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Articles::create([
            'title' => 'ehab',
            'content' => 'this is an article',
            'status' => 'jkldsafda',
            'author' => 'fdsgsfdg',
            'publication_date' => now(),
            'image' => "fsgsgs",
            'category_id' => 1,
        ]);
        Articles::create([
            'title' => 'ehab',
            'content' => 'this is an article',
            'status' => 'jkldsafda',
            'author' => 'fdsgsfdg',
            'publication_date' => now(),
            'image' => "fsgsgs",
            'category_id' => 1,
        ]);
        Articles::create([
            'title' => 'ehab',
            'content' => 'this is an article',
            'status' => 'jkldsafda',
            'author' => 'fdsgsfdg',
            'publication_date' => now(),
            'image' => "fsgsgs",
            'category_id' => 1,
        ]);
        Articles::create([
            'title' => 'ehab',
            'content' => 'this is an article',
            'status' => 'jkldsafda',
            'author' => 'fdsgsfdg',
            'publication_date' => now(),
            'image' => "fsgsgs",
            'category_id' => 1,
        ]);
    }
}
