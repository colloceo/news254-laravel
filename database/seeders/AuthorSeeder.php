<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            [
                'name' => 'News254ke',
                'email' => 'news254ke@news254.co.ke',
                'avatar' => 'https://images.pexels.com/photos/3769021/pexels-photo-3769021.jpeg?auto=compress&cs=tinysrgb&w=400',
                'bio' => 'Leading news platform in Kenya covering politics, business, technology, and more.',
                'social_links' => ['twitter' => '@news254ke', 'email' => 'news254ke@news254.co.ke']
            ],
            [
                'name' => 'Collins Otieno',
                'email' => 'collins@news254.co.ke',
                'avatar' => 'https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=400',
                'bio' => 'Lead Developer and Editor-in-Chief at News254, passionate about technology and journalism.',
                'social_links' => ['linkedin' => 'collins-otieno', 'email' => 'collins@news254.co.ke']
            ],
            [
                'name' => 'Justin Ludeki',
                'email' => 'justin@news254.co.ke',
                'avatar' => 'https://images.pexels.com/photos/3785077/pexels-photo-3785077.jpeg?auto=compress&cs=tinysrgb&w=400',
                'bio' => 'Political correspondent and content manager specializing in Kenyan politics and governance.',
                'social_links' => ['twitter' => '@justinludeki', 'email' => 'justin@news254.co.ke']
            ],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}