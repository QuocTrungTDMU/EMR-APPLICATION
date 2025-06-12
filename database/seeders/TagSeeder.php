<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Precaution', 'color' => '#10B981'],
            ['name' => 'Safety', 'color' => '#F59E0B'],
            ['name' => 'Health', 'color' => '#3B82F6'],
            ['name' => 'Prevention', 'color' => '#8B5CF6'],
            ['name' => 'Hygiene', 'color' => '#06B6D4'],
            ['name' => 'Medical', 'color' => '#EF4444'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
