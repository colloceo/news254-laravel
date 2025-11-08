<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'author_id',
        'category_id',
        'tags',
        'featured_image',
        'is_breaking',
        'is_featured',
        'is_trending',
        'is_draft',
        'read_time',
        'views',
        'published_at',
        'language'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_breaking' => 'boolean',
        'is_featured' => 'boolean',
        'is_trending' => 'boolean',
        'is_draft' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_draft', false)
                    ->where('published_at', '<=', now());
    }

    public function scopeBreaking($query)
    {
        return $query->where('is_breaking', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeTrending($query)
    {
        return $query->where('is_trending', true);
    }

    public function scopeLanguage($query, $language = 'en')
    {
        return $query->where('language', $language);
    }

    public function getReadTimeAttribute($value)
    {
        return max(1, ceil(str_word_count(strip_tags($this->content)) / 200));
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}