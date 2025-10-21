<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>News254 - Kenya's Premier News Platform</title>
        <link>{{ url('/') }}</link>
        <description>Stay informed with News254 - Kenya's leading source for politics, business, technology, sports, and entertainment news.</description>
        <language>en-ke</language>
        <lastBuildDate>{{ now()->toRssString() }}</lastBuildDate>
        <atom:link href="{{ url('/rss') }}" rel="self" type="application/rss+xml" />
        
        @foreach($articles as $article)
        <item>
            <title><![CDATA[{{ $article->title }}]]></title>
            <link>{{ route('article.show', $article->slug) }}</link>
            <description><![CDATA[{{ $article->excerpt }}]]></description>
            <author>{{ $article->author->email }} ({{ $article->author->name }})</author>
            <category>{{ $article->category->name }}</category>
            <pubDate>{{ $article->published_at->toRssString() }}</pubDate>
            <guid>{{ route('article.show', $article->slug) }}</guid>
        </item>
        @endforeach
    </channel>
</rss>