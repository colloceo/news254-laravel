<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Politics', 'slug' => 'politics', 'color' => '#DC2626', 'icon' => 'Users'],
            ['name' => 'Business', 'slug' => 'business', 'color' => '#059669', 'icon' => 'TrendingUp'],
            ['name' => 'Technology', 'slug' => 'technology', 'color' => '#7C3AED', 'icon' => 'Smartphone'],
            ['name' => 'Sports', 'slug' => 'sports', 'color' => '#EA580C', 'icon' => 'Trophy'],
            ['name' => 'Entertainment', 'slug' => 'entertainment', 'color' => '#DB2777', 'icon' => 'Music'],
            ['name' => 'Lifestyle', 'slug' => 'lifestyle', 'color' => '#0891B2', 'icon' => 'Heart'],
            ['name' => 'Health', 'slug' => 'health', 'color' => '#16A34A', 'icon' => 'Heart'],
            ['name' => 'Education', 'slug' => 'education', 'color' => '#2563EB', 'icon' => 'BookOpen'],
            ['name' => 'Environment', 'slug' => 'environment', 'color' => '#059669', 'icon' => 'Leaf'],
            ['name' => 'Crime', 'slug' => 'crime', 'color' => '#991B1B', 'icon' => 'Shield'],
            ['name' => 'International', 'slug' => 'international', 'color' => '#1F2937', 'icon' => 'Globe'],
            ['name' => 'Economy', 'slug' => 'economy', 'color' => '#B45309', 'icon' => 'DollarSign'],
            ['name' => 'Agriculture', 'slug' => 'agriculture', 'color' => '#65A30D', 'icon' => 'Wheat'],
            ['name' => 'Transport', 'slug' => 'transport', 'color' => '#4338CA', 'icon' => 'Car'],
            ['name' => 'Tourism', 'slug' => 'tourism', 'color' => '#0D9488', 'icon' => 'Camera'],
            ['name' => 'Weather', 'slug' => 'weather', 'color' => '#0EA5E9', 'icon' => 'Cloud'],
            ['name' => 'Opinion', 'slug' => 'opinion', 'color' => '#7C2D12', 'icon' => 'MessageCircle'],
            ['name' => 'Culture', 'slug' => 'culture', 'color' => '#A21CAF', 'icon' => 'Users'],
            ['name' => 'Science', 'slug' => 'science', 'color' => '#6366F1', 'icon' => 'Atom'],
            ['name' => 'Religion', 'slug' => 'religion', 'color' => '#92400E', 'icon' => 'Church'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}