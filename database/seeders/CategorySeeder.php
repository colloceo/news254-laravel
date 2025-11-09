<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Politics', 'slug' => 'politics', 'color' => '#DC2626'],
            ['name' => 'Business', 'slug' => 'business', 'color' => '#059669'],
            ['name' => 'Technology', 'slug' => 'technology', 'color' => '#7C3AED'],
            ['name' => 'Sports', 'slug' => 'sports', 'color' => '#EA580C'],
            ['name' => 'Entertainment', 'slug' => 'entertainment', 'color' => '#DB2777'],
            ['name' => 'Lifestyle', 'slug' => 'lifestyle', 'color' => '#0891B2'],
            ['name' => 'Health', 'slug' => 'health', 'color' => '#16A34A'],
            ['name' => 'Education', 'slug' => 'education', 'color' => '#2563EB'],
            ['name' => 'Environment', 'slug' => 'environment', 'color' => '#059669'],
            ['name' => 'Crime', 'slug' => 'crime', 'color' => '#991B1B'],
            ['name' => 'International', 'slug' => 'international', 'color' => '#1F2937'],
            ['name' => 'Economy', 'slug' => 'economy', 'color' => '#B45309'],
            ['name' => 'Agriculture', 'slug' => 'agriculture', 'color' => '#65A30D'],
            ['name' => 'Transport', 'slug' => 'transport', 'color' => '#4338CA'],
            ['name' => 'Tourism', 'slug' => 'tourism', 'color' => '#0D9488'],
            ['name' => 'Weather', 'slug' => 'weather', 'color' => '#0EA5E9'],
            ['name' => 'Opinion', 'slug' => 'opinion', 'color' => '#7C2D12'],
            ['name' => 'Culture', 'slug' => 'culture', 'color' => '#A21CAF'],
            ['name' => 'Science', 'slug' => 'science', 'color' => '#6366F1'],
            ['name' => 'Religion', 'slug' => 'religion', 'color' => '#92400E'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}