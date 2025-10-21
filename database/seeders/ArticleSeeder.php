<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'President Ruto Announces New Economic Recovery Plan for Kenya',
                'content' => '<p>President William Ruto has unveiled a comprehensive economic recovery plan aimed at addressing Kenya\'s current financial challenges and spurring growth across key sectors.</p><p>The plan, announced during a press conference at State House, focuses on five key areas: agriculture modernization, manufacturing growth, housing development, digital transformation, and export diversification.</p><blockquote>"This is not just another policy document, but a roadmap to economic transformation that will benefit every Kenyan," President Ruto stated.</blockquote><h3>Key Highlights of the Plan</h3><ul><li>Ksh 500 billion investment in agriculture over the next three years</li><li>Creation of 2 million jobs in the manufacturing sector</li><li>100,000 affordable housing units annually</li><li>Digital infrastructure expansion to rural areas</li></ul><p>The President emphasized that the plan would be implemented in phases, with the first phase beginning immediately and expected to show results within six months.</p>',
                'excerpt' => 'President Ruto unveils comprehensive economic recovery plan targeting agriculture, manufacturing, housing, and digital transformation sectors.',
                'author_id' => 1,
                'category_id' => 1,
                'tags' => ['economy', 'politics', 'ruto', 'recovery', 'agriculture'],
                'featured_image' => 'https://images.pexels.com/photos/6077326/pexels-photo-6077326.jpeg?auto=compress&cs=tinysrgb&w=800',
                'is_breaking' => true,
                'is_featured' => true,
                'is_draft' => false,
                'views' => 1247,
                'published_at' => now()
            ],
            [
                'title' => 'Safaricom Launches 5G Network in Major Kenyan Cities',
                'content' => '<p>Safaricom has officially launched its 5G network across Nairobi, Mombasa, Kisumu, and Nakuru, marking a significant milestone in Kenya\'s digital transformation journey.</p><p>The rollout promises to deliver internet speeds up to 100 times faster than current 4G networks, potentially revolutionizing how Kenyans access digital services.</p><h3>Impact on Businesses and Consumers</h3><p>The 5G network is expected to benefit various sectors including healthcare, education, agriculture, and manufacturing through enhanced connectivity and reduced latency.</p><p>Safaricom CEO Peter Ndegwa stated that the network will initially cover 35% of the urban population, with plans to expand to 80% coverage by 2025.</p>',
                'excerpt' => 'Safaricom launches 5G network in four major cities, promising revolutionary internet speeds and digital transformation.',
                'author_id' => 2,
                'category_id' => 3,
                'tags' => ['technology', 'safaricom', '5g', 'telecommunications', 'digital'],
                'featured_image' => 'https://images.pexels.com/photos/6802049/pexels-photo-6802049.jpeg?auto=compress&cs=tinysrgb&w=800',
                'is_breaking' => false,
                'is_featured' => true,
                'is_draft' => false,
                'views' => 892,
                'published_at' => now()->subDay()
            ],
            [
                'title' => 'Kenya Shilling Strengthens Against Dollar Amid Economic Reforms',
                'content' => '<p>The Kenyan shilling has shown remarkable resilience, gaining 15% against the US dollar over the past month, driven by government economic reforms and increased investor confidence.</p><p>Financial analysts attribute this strengthening to several factors including improved foreign exchange reserves, reduced government borrowing, and successful implementation of fiscal consolidation measures.</p><h3>Market Response</h3><p>The Nairobi Securities Exchange has responded positively to the currency strengthening, with the NSE 20 Share Index gaining 8% in the past week.</p><p>Central Bank of Kenya Governor Kamau Thugge expressed optimism about the currency\'s stability, citing strong fundamentals and continued economic reforms.</p>',
                'excerpt' => 'Kenyan shilling gains 15% against dollar as economic reforms boost investor confidence and market stability.',
                'author_id' => 1,
                'category_id' => 2,
                'tags' => ['business', 'economy', 'currency', 'dollar', 'cbk'],
                'featured_image' => 'https://images.pexels.com/photos/3483098/pexels-photo-3483098.jpeg?auto=compress&cs=tinysrgb&w=800',
                'is_breaking' => false,
                'is_featured' => false,
                'is_draft' => false,
                'views' => 634,
                'published_at' => now()->subDays(2)
            ],
            [
                'title' => 'Harambee Stars Qualify for AFCON 2025 After Victory Over Tanzania',
                'content' => '<p>Kenya\'s national football team, Harambee Stars, secured their spot in the 2025 Africa Cup of Nations after a thrilling 2-1 victory over Tanzania at the Kasarani Stadium.</p><p>Goals from Michael Olunga and Jonah Ayunga sealed the qualification, sending thousands of fans into celebration as Kenya returns to AFCON after missing the last two editions.</p><h3>Match Highlights</h3><p>The match was a tense affair with Tanzania taking an early lead through Feisal Salum in the 15th minute. However, Kenya responded strongly with Olunga equalizing just before halftime.</p><p>The winning goal came in the 78th minute when Ayunga capitalized on a defensive error to score what proved to be the decisive goal.</p><p>Head coach Engin Firat praised the team\'s determination and the incredible support from Kenyan fans throughout the qualifying campaign.</p>',
                'excerpt' => 'Harambee Stars qualify for AFCON 2025 with a 2-1 victory over Tanzania, ending years of absence from the continental tournament.',
                'author_id' => 3,
                'category_id' => 4,
                'tags' => ['sports', 'football', 'harambee-stars', 'afcon', 'qualification'],
                'featured_image' => 'https://images.pexels.com/photos/274506/pexels-photo-274506.jpeg?auto=compress&cs=tinysrgb&w=800',
                'is_breaking' => false,
                'is_featured' => true,
                'is_draft' => false,
                'views' => 1823,
                'published_at' => now()->subDays(3)
            ],
            [
                'title' => 'Nyashinski Announces Comeback Album After Three-Year Hiatus',
                'content' => '<p>Kenyan hip-hop legend Nyashinski has announced his highly anticipated comeback album "Metamorphosis," set to release in December 2024, marking his return after a three-year hiatus.</p><p>The album, which features collaborations with top Kenyan and international artists, promises to showcase Nyashinski\'s evolution as an artist and his commentary on contemporary African society.</p><h3>What to Expect</h3><p>The 14-track album will feature a blend of hip-hop, Afrobeats, and traditional Kenyan sounds, with guest appearances from Sauti Sol, Burna Boy, and several rising Kenyan artists.</p><p>"This album represents my journey over the past three years and my observations about our changing world," Nyashinski said during a press conference in Nairobi.</p><p>The first single "Mapema" is set to drop next week, with a music video shot in various locations across Kenya.</p>',
                'excerpt' => 'Hip-hop star Nyashinski announces comeback album "Metamorphosis" featuring collaborations with top African artists.',
                'author_id' => 2,
                'category_id' => 5,
                'tags' => ['entertainment', 'music', 'nyashinski', 'album', 'hip-hop'],
                'featured_image' => 'https://images.pexels.com/photos/1763075/pexels-photo-1763075.jpeg?auto=compress&cs=tinysrgb&w=800',
                'is_breaking' => false,
                'is_featured' => false,
                'is_draft' => false,
                'views' => 756,
                'published_at' => now()->subDays(4)
            ],
            [
                'title' => 'Nairobi to Host Africa Tech Summit 2024 with Focus on AI Innovation',
                'content' => '<p>Nairobi has been selected to host the Africa Tech Summit 2024, bringing together over 500 tech leaders, entrepreneurs, and innovators from across the continent to discuss artificial intelligence and its impact on African development.</p><p>The three-day summit, scheduled for November 15-17, will feature keynote speeches from prominent tech leaders, panel discussions on AI in agriculture, healthcare, and finance, and a startup pitch competition.</p><h3>Key Themes</h3><ul><li>AI for sustainable development in Africa</li><li>Digital transformation in traditional industries</li><li>Building local tech talent and capacity</li><li>Ethical AI development and deployment</li></ul><p>The summit is expected to generate significant investment opportunities and partnerships between African startups and international tech companies.</p>',
                'excerpt' => 'Nairobi to host Africa Tech Summit 2024 focusing on AI innovation and sustainable development across the continent.',
                'author_id' => 2,
                'category_id' => 3,
                'tags' => ['technology', 'ai', 'summit', 'innovation', 'nairobi'],
                'featured_image' => 'https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&w=800',
                'is_breaking' => false,
                'is_featured' => false,
                'is_draft' => false,
                'views' => 445,
                'published_at' => now()->subDays(5)
            ]
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}