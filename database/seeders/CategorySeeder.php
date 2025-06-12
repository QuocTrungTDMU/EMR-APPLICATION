<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Health & Wellness',
                'slug' => 'health-wellness',
                'description' => 'General health tips and wellness advice',
                'color' => '#10B981',
                'icon' => 'fas fa-heart',
                'sort_order' => 1
            ],
            [
                'name' => 'Medical Devices',
                'slug' => 'medical-devices',
                'description' => 'Information about medical equipment and devices',
                'color' => '#3B82F6',
                'icon' => 'fas fa-stethoscope',
                'sort_order' => 2
            ],
            [
                'name' => 'Safety Tips',
                'slug' => 'safety-tips',
                'description' => 'Safety guidelines and precautions',
                'color' => '#F59E0B',
                'icon' => 'fas fa-shield-alt',
                'sort_order' => 3
            ],
            [
                'name' => 'COVID-19',
                'slug' => 'covid-19',
                'description' => 'COVID-19 related information and updates',
                'color' => '#EF4444',
                'icon' => 'fas fa-virus',
                'sort_order' => 4
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
