<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Comment Notification</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #16A34A;">New Comment on News254</h2>
        
        <p>A new comment has been posted on the article: <strong>{{ $comment->article->title }}</strong></p>
        
        <div style="background: #f5f5f5; padding: 15px; border-left: 4px solid #16A34A; margin: 20px 0;">
            <p><strong>From:</strong> {{ $comment->author_name }} ({{ $comment->author_email }})</p>
            <p><strong>Comment:</strong></p>
            <p>{{ $comment->content }}</p>
        </div>
        
        <p>
            <a href="{{ route('article.show', $comment->article->slug) }}" 
               style="background: #16A34A; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                View Article
            </a>
        </p>
        
        <hr style="margin: 30px 0;">
        <p style="font-size: 12px; color: #666;">
            This is an automated notification from News254.
        </p>
    </div>
</body>
</html>