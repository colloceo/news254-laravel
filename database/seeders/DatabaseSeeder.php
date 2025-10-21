<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@news254.co.ke',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
        ]);

        // Run seeders
        $this->call([
            CategorySeeder::class,
            AuthorSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}