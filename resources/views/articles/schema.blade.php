@section('schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "NewsArticle",
    "headline": "{{ $article->title }}",
    "description": "{{ $article->excerpt }}",
    "image": {
        "@type": "ImageObject",
        "url": "{{ $article->featured_image }}",
        "width": 1200,
        "height": 630
    },
    "author": {
        "@type": "Person",
        "name": "{{ $article->author->name }}",
        "url": "{{ $article->author->website ?? 'https://news254.co.ke' }}"
    },
    "publisher": {
        "@type": "NewsMediaOrganization",
        "name": "News254",
        "logo": {
            "@type": "ImageObject",
            "url": "https://iili.io/FULcRiF.png",
            "width": 200,
            "height": 200
        }
    },
    "datePublished": "{{ $article->published_at->toISOString() }}",
    "dateModified": "{{ $article->updated_at->toISOString() }}",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ route('article.show', $article->slug) }}"
    },
    "articleSection": "{{ $article->category->name }}",
    "keywords": "{{ $article->category->name }}, Kenya news, {{ strtolower($article->category->name) }} Kenya",
    "wordCount": {{ str_word_count(strip_tags($article->content)) }},
    "inLanguage": "en-KE",
    "isAccessibleForFree": true,
    "hasPart": {
        "@type": "WebPageElement",
        "@id": "{{ route('article.show', $article->slug) }}#content"
    }
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "{{ $article->category->name }}",
            "item": "{{ route('category.show', $article->category->slug) }}"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $article->title }}",
            "item": "{{ route('article.show', $article->slug) }}"
        }
    ]
}
</script>
@endsection